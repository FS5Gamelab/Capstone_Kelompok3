<?php

namespace App\Http\Controllers;

use App\Models\Applications;
use App\Models\Jobs;
use Illuminate\Http\Request;
use App\Models\Seekers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
   public function store(Request $request)
    {
     $request->validate([
        'job_id' => 'required|exists:jobs,id',
        'cv' => 'required|mimes:pdf,doc,docx|max:2048',
    ]);

    $fileName = time() . '.' . $request->cv->extension();  
    $request->cv->move(public_path('storage'), $fileName);

    $seeker = Seekers::where('user_id', Auth::id())->firstOrFail();

    Applications::create([
        'job_id' => $request->job_id,
        'seeker_id' => $seeker->id,
        'applicationDate' => now(),
        'status' => 'pending',
        'cv' => $fileName,
    ]);

    return back()->with('success', 'Application submitted successfully.');
}
}