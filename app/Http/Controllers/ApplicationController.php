<?php

namespace App\Http\Controllers;

use App\Models\Applications;
use App\Models\Seekers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'job_id' => 'required|exists:jobs,id',
            'cv' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        // Dapatkan seeker yang sedang login
        $seeker = Seekers::where('user_id', Auth::id())->firstOrFail();

        // Simpan file CV menggunakan Storage facade
        $filePath = $request->file('cv')->store('cvs', 'public');

        // Buat aplikasi baru
        Applications::create([
            'job_id' => $request->job_id,
            'seeker_id' => $seeker->id,
            'applicationDate' => now(),
            'status' => 'pending',
            'cv' => $filePath,
        ]);

        return redirect()->route('seeker.jobs.index')->with('success', 'Application submitted successfully.');
    }

    public function appliedJobs()
    {
        $seekerId = Seekers::where('user_id', Auth::id())->first()->id;
        $applications = Applications::where('seeker_id', $seekerId)->with('job')->get();
        return view('seeker.applied_jobs', compact('applications'));
    }
}
