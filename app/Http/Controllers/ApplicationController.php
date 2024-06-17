<?php
namespace App\Http\Controllers;

use App\Models\Applications;
use App\Models\Jobs;
use App\Models\Seekers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'job_id' => 'required|exists:jobs,id',
            'cv' => 'required|mimes:pdf,doc,docx|max:9048',
        ]);

        $seeker = Seekers::where('user_id', Auth::id())->firstOrFail();
        $existingApplication = Applications::where('job_id', $request->job_id)
                                            ->where('seeker_id', $seeker->id)
                                            ->first();

        if ($existingApplication) {
            return redirect()->route('seeker.applied_jobs')->with('error', 'You have already applied for this job.');
        }

        $filePath = $request->file('cv')->store('cvs', 'public');

        Applications::create([
            'job_id' => $request->job_id,
            'seeker_id' => $seeker->id,
            'applicationDate' => now(),
            'status' => 'pending',
            'cv' => $filePath,
        ]);

        return redirect()->route('seeker.applied_jobs')->with('success', 'Application submitted successfully.');
    }

    public function showJob($id)
    {
        $job = Jobs::with(['applications' => function ($query) {
            $seeker = Seekers::where('user_id', Auth::id())->first();
            if ($seeker) {
                $query->where('seeker_id', $seeker->id);
            }
        }])->findOrFail($id);

        $seeker = Seekers::where('user_id', Auth::id())->first();
        $hasApplied = false;

        if ($seeker) {
            $hasApplied = Applications::where('job_id', $id)
                                       ->where('seeker_id', $seeker->id)
                                       ->exists();
        }

        return view('seeker.jobs.show', compact('job', 'hasApplied'));
    }

    public function appliedJobs()
    {
        $seekerId = Seekers::where('user_id', Auth::id())->first()->id;
        $applications = Applications::where('seeker_id', $seekerId)->with('job')->get();
        return view('seeker.applied_jobs', compact('applications'));
    }
}