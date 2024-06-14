<?php

namespace App\Http\Controllers;

use App\Models\Applications;
use App\Models\Jobs;
use App\Models\Seekers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeekersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
    public function appliedJobs()
    {
        $seekerId = Auth::id();
        $applications = Applications::where('seeker_id', $seekerId)->with('job')->get();
        return view('seeker.applied_jobs', compact('applications'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function showProfile($seekerId)
    {
        $profile = Seekers::where('user_id', $seekerId)->first();
        $user = Auth::user();
        return view('seeker.profile', compact('profile', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seekers $seekers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateProfile(Request $request, $seekerId)
    {
        $validatedData = $request->validate([
            'fullName' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'skills' => 'required|string',
            'resume' => 'required|string',
            'profile' => 'required|string',
        ]);

        // Find the profile or create a new one
        $profile = Seekers::firstOrNew(['user_id' => $seekerId]);

        // Update the profile with validated data
        $profile->fill($validatedData);
        $profile->save();

        return redirect()->back()->with('success', 'Profile updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seekers $seekers)
    {
        //
    //
    }
}
