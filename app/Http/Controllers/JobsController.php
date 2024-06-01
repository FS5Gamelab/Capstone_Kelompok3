<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('company.partials.jobs.index', [
            'jobs' => Jobs::where('company_id', $user->companies->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.partials.jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'job_title'     => 'required',
            'job_description'   => 'required',
            'job_require'   => 'required',
            'job_location'   => 'required',
            'job_type'   => 'required',
            'job_salary'   => 'required|numeric',
        ]);
        $user = User::findOrFail(Auth::user()->id);
        Jobs::create([
            'company_id'     => $user->companies->id,
            'jobTitle'     => $request->job_title,
            'jobDescription'   => $request->job_description,
            'jobRequire'     => $request->job_require,
            'jobLocation'     => $request->job_location,
            'jobType'     => $request->job_type,
            'salary'     => $request->job_salary,
            'postedDate'     => now()->format('Y-m-d'),
        ]);
        return redirect('/company/jobs')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(Jobs $job)
    {
        return view('company.partials.jobs.show', compact('job'));
    }

    public function edit($id)
    {

        return view('company.partials.jobs.edit', [
            'jobs' => Jobs::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'job_title'     => 'required',
            'job_description'   => 'required',
            'job_require'   => 'required',
            'job_location'   => 'required',
            'job_type'   => 'required',
            'job_salary'   => 'required|numeric',
            'job_status'   => 'required',
        ]);
        $job = Jobs::findOrFail($id);
        $job->update([
            'jobTitle'     => $request->job_title,
            'jobDescription'   => $request->job_description,
            'jobRequire'     => $request->job_require,
            'jobLocation'     => $request->job_location,
            'jobType'     => $request->job_type,
            'salary'     => $request->job_salary,
            'jobStatus'     => $request->job_status,
            'postedDate'     => now()->format('Y-m-d'),
        ]);
        return redirect('/company/jobs')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        $post = Jobs::findOrFail($id);
        $post->delete();
        return redirect('/company/jobs')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
