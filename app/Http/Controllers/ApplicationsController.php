<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applications;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Jobs;
use Illuminate\Support\Facades\Storage;

class ApplicationsController extends Controller
{

    public function index()
    {

        $company_id = User::findOrFail(Auth::user()->id)->companies->id;
        $applications = Applications::whereHas('job', function ($query) use ($company_id) {
            $query->where('company_id', $company_id);
        })->get();
        return view('company.partials.applications.index', [
            'applications' => $applications,
            'title' => 'Application',
            'perusahaan' => User::findOrFail(Auth::user()->id)->companies->companyName

        ]);
    }

    public function edit($id)
    {
        session(['previous_url' => url()->previous()]);
        return view('company.partials.applications.edit', [
            'application' => Applications::findOrFail($id),
            'title' => 'Application',
            'perusahaan' => User::findOrFail(Auth::user()->id)->companies->companyName
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'status'   => 'required',
        ]);
        $applications = Applications::findOrFail($id);
        $applications->update([
            'status'     => $request->status,
        ]);
        $previousUrl = session('previous_url');
        if (strpos($previousUrl, '/company/jobs/') !== false) {
            return redirect($previousUrl)->with(['success' => 'Data Berhasil Diubah!']);
        } elseif (strpos($previousUrl, '/applications') !== false) {
            return redirect('/applications')->with(['success' => 'Data Berhasil Diubah!']);
        }
        return redirect('/applications')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        $application = Applications::findOrFail($id);
        $application->delete();
        return redirect('/applications')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function trash()
    {
        $company_id = User::findOrFail(Auth::user()->id)->companies->id;
        $trashedApplications = Applications::onlyTrashed()
            ->whereHas('job', function ($query) use ($company_id) {
                $query->where('company_id', $company_id);
            })->get();
        return view('company.partials.applications.trash', [
            'trashedApplications' => $trashedApplications,
            'title' => 'Application',
            'perusahaan' => User::findOrFail(Auth::user()->id)->companies->companyName
        ]);
    }

    public function restore($id)
    {
        $application = Applications::onlyTrashed()->where('id', $id);
        $application->restore();
        return redirect('/applications')->with(['success' => 'Data Berhasil Dipilihkan!']);
    }
}
