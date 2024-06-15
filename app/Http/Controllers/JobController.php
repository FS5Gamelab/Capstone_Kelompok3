<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use App\Models\Categories;
use App\Models\Applications;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request)
    { 
        $query = Jobs::where('jobStatus', 'buka');

        // Apply filters
        if ($request->has('categories') && $request->categories != '') {
            $query->where('categories_id', $request->categories);
        }

        if ($request->has('location') && $request->location != '') {
            $query->where('jobLocation', 'like', '%' . $request->location . '%');
        }

        if ($request->has('salary') && $request->salary != '') {
            $query->where('salary', 'like', '%' . $request->salary . '%');
        }

        $jobs = $query->get();
        $categories = Categories::all(); // For populating filter options

        return view('seeker.jobs.index', compact('jobs', 'categories'));
    }

    public function show($id)
<<<<<<< HEAD
    {   
        
        $jobs = Jobs::findOrFail($id);
        $applications = $jobs->applications;
=======
    {
        $jobs = Jobs::with('applications.seeker')->findOrFail($id);

>>>>>>> 9583c031d6401a3c18559d6f97942a78afddb1a6
        return view('seeker.jobs.show', compact('jobs'));
    }
}