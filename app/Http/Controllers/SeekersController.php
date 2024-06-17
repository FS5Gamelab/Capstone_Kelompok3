<?php

namespace App\Http\Controllers;

use App\Models\Applications;
use App\Models\Seekers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SeekersController extends Controller
{
    public function show($seekerId)
    {
        $profile = Seekers::where('user_id', $seekerId)->first();
        $user = Auth::user();
        return view('seeker.profile', compact('profile', 'user', 'seekerId'));
    }
    public function appliedJobs()
    {
        $seekerId = Seekers::where('user_id', Auth::id())->first()->id;
        $applications = Applications::where('seeker_id', $seekerId)->with('job')->get();
        return view('seeker.applied_jobs', compact('applications'));
    }

    public function edit()
    {
        $seeker = Seekers::where('user_id', auth()->id())->firstOrFail();
        return view('seeker.profile.edit', compact('seeker'));
    }

    public function updateProfile(Request $request, $seekerId)
    {
        $request->validate([
            'fullName' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:500',
            'phone' => 'nullable|string|max:20',
            'skills' => 'nullable|string|max:255',
            'resume' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        $seeker = Seekers::firstOrNew(['user_id' => $seekerId]);
        $seeker->fill($request->except('resume'));

        if ($request->hasFile('resume')) {
            if ($seeker->resume) {
                Storage::delete($seeker->resume);
            }
            $path = $request->file('resume')->store('resumes', 'public');
            $seeker->resume = $path;
        }

        $seeker->save();

        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function viewResume($seekerId)
    {
        $seeker = Seekers::where('user_id', $seekerId)->firstOrFail();
        if ($seeker->resume) {
            $filePath = 'public/' . $seeker->resume;
            if (Storage::exists($filePath)) {
                return response()->file(storage_path('app/' . $filePath));
            }
        }
        return abort(404, 'Resume not found');
    }
}
