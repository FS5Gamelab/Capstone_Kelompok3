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
    {   
        
        $jobs = Jobs::findOrFail($id);
        $applications = $jobs->applications;
        return view('seeker.jobs.show', compact('jobs'));
    }
}