<?php

namespace App\Http\Controllers;

use App\Models\Applications;
use App\Models\Categories;
use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class JobsController extends Controller
{

    public function index()
    {
        $company_id = User::findOrFail(Auth::user()->id)->companies->id;
        $jobs = Jobs::where('company_id', $company_id)->get();
        $Jmlapplications = [];
        foreach ($jobs as $job) {
            $Jmlapplications[$job->id]  = Applications::whereHas('job', function ($query) use ($company_id, $job) {
                $query->where('company_id', $company_id)->where('job_id',  $job->id);
            })->count();
        }

        return view('company.partials.jobs.index', [
            'jobs' => $jobs,
            'jml_application' => $Jmlapplications,
            'title' => 'Jobs'

        ]);
    }

    public function create()
    {
        $categories = Categories::all();
        return view('company.partials.jobs.create', [
            'categories' => $categories,
            'title' => 'Jobs'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'job_title'     => 'required',
            'category_id'     => 'required',
            'job_description'   => 'required',
            'job_require'   => 'required',
            'job_location'   => 'required',
            'job_type'   => 'required',
            'job_salary'   => 'required|numeric',
        ]);
        $user = User::findOrFail(Auth::user()->id);
        Jobs::create([
            'company_id'     => $user->companies->id,
            'category_id'     => $request->category_id,
            'jobTitle'     => $request->job_title,
            'jobDescription'   => $request->job_description,
            'jobRequire'     => $request->job_require,
            'jobLocation'     => $request->job_location,
            'jobType'     => $request->job_type,
            'salary'     => $request->job_salary,
            'postedDate'     => now()->format('Y-m-d'),
        ]);
        return redirect('/company/jobs')->with(['success' => 'Lowongan Baru Dibuka !!']);
    }

    public function show(Jobs $job)
    {
        $company_id = User::findOrFail(Auth::user()->id)->companies->id;
        $jobs = Jobs::where('company_id', $company_id)->get();
        $applications = Applications::whereHas('job', function ($query) use ($company_id, $job) {
            $query->where('company_id', $company_id)->where('job_id', $job->id);
        })->get();
        return view('company.partials.jobs.show',[
                'job' => $job,
                'applications' => $applications,
                'title' => 'Jobs'
            ]
        );
    }

    public function edit($id)
    {
        $categories = Categories::all();
        return view('company.partials.jobs.edit', [
            'jobs' => Jobs::findOrFail($id),
            'categories' => $categories,
             'title' => 'Jobs'
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'job_title'     => 'required',
            'category_id'     => 'required',
            'job_description'   => 'required',
            'job_require'   => 'required',
            'job_location'   => 'required',
            'job_type'   => 'required',
            'job_salary'   => 'required|numeric',
            'job_status'   => 'required',
        ]);
        $job = Jobs::findOrFail($id);
        $job->update([
            'category_id' => $request->category_id,
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
        $job = Jobs::findOrFail($id);
        $job->delete();
        return redirect('/company/jobs')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function trash()
    {

        $jobs = Jobs::onlyTrashed()->get();
        return view('company.partials.jobs.trash', ['jobs' => $jobs, 'title' => 'Jobs']);
    }

    public function restore($id)
    {
        $jobs = Jobs::onlyTrashed()->where('id', $id);
        $jobs->restore();
        return redirect('/company/jobs')->with(['success' => 'Data Berhasil Dipilihkan!']);
    }

    // public function deletepermanently($id)
    // {
    //     $category = Jobs::onlyTrashed()->where('id', $id);
    //     $category->forceDelete();
    //     return redirect('/company/jobs')->with(['success' => 'Data Dihapus Permanen']);
    // }
}
