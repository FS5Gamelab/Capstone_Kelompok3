<?php

namespace App\Http\Controllers;

use App\Events\ProfileUpdated;
use App\Models\Applications;
use App\Models\Jobs;
use App\Models\Seekers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
    public function downloadCV($id)
    {
        $seeker = Seekers::findOrFail($id);
        $filePath = $seeker->resume; // Adjust as per your storage configuration

        return Storage::disk('public')->download($filePath);
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
    public function show()
    {
<<<<<<< HEAD
        $profile = Seekers::where('user_id', $seekerId)->first();
        $user = Auth::user();
        return view('seeker.profile', compact('profile', 'user', 'seekerId'));
=======
        $seekers = Seekers::where('user_id', auth()->id())->firstOrFail();

        return view('seeker.profile.show', compact('seeker'));
>>>>>>> 9583c031d6401a3c18559d6f97942a78afddb1a6
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $seekers = Seekers::where('user_id', auth()->id())->firstOrFail();

        return view('seeker.profile.edit', compact('seeker'));
    }

    /**
     * Update the specified resource in storage.
     */
<<<<<<< HEAD
    
     public function updateProfile(Request $request, $seekerId)
     {
         $request->validate([
             'fullName' => 'nullable|string|max:255',
             'address' => 'nullable|string|max:500',
             'phone' => 'nullable|string|max:20',
             'skills' => 'nullable|string|max:255',
             'resume' => 'nullable|file|mimes:pdf|max:10240', // max size 10MB
         ]);
     
         $seeker = Seekers::firstOrNew(['user_id' => $seekerId]);
         $seeker->fill($request->except('resume'));
     
         if ($request->hasFile('resume')) {
             // Delete the old resume if it exists
             if ($seeker->resume) {
                 Storage::delete($seeker->resume);
             }
     
             // Store the new resume
             $path = $request->file('resume')->store('resumes', 'public');
             $seeker->resume = $path;
         }
     
         $seeker->save();
     
         event(new ProfileUpdated($seeker));
     
         return redirect()->back()->with('success', 'Profile updated successfully');
     }


     public function viewResume($seekerId)
{
    $seeker = Seekers::where('user_id', $seekerId)->firstOrFail();

    if ($seeker->resume) {
        // Get the file path
        $filePath = 'public/' . $seeker->resume;

        // Check if the file exists
        if (Storage::exists($filePath)) {
            // Return the file for viewing
            return response()->file(storage_path('app/' . $filePath));
        }
    }

    return redirect()->back()->with('error', 'Resume not found or not uploaded.');
}
=======
    public function update(Request $request)
    {
        // Validasi data yang dikirim
        $request->validate([
            'fullName' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|max:20',
            'skills' => 'required|string',
            'resume' => 'nullable|mimes:pdf,doc,docx|max:2048', // optional, max 2MB
            'profile' => 'nullable|image|max:2048', // optional, max 2MB
        ]);

        // Simpan data ke dalam database
        $seekers = Seekers::where('user_id', auth()->id())->firstOrFail(); // Mengasumsikan user_id ada dalam model Seeker

        $seekers->fullName = $request->fullName;
        $seekers->address = $request->address;
        $seekers->phone = $request->phone;
        $seekers->skills = $request->skills;

        // Proses upload resume jika ada
        if ($request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store('resumes');
            $seekers->resume = $resumePath;
        }

        // Proses upload foto profil jika ada
        if ($request->hasFile('profile')) {
            $profilePath = $request->file('profile')->store('profiles');
            $seekers->profile = $profilePath;
        }

        $seekers->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('seeker.profile.show')->with('success', 'Profile updated successfully');
    }
>>>>>>> 9583c031d6401a3c18559d6f97942a78afddb1a6
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seekers $seekers)
    {
        //
    //
    }
}
