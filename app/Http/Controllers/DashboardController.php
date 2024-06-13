<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Companies;
use App\Models\Applications;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $role = Auth::user()->role;
            if ($role == 'company') {
                $perusahaan = User::findOrFail(Auth::user()->id)->companies->companyName;
                $company_id = User::findOrFail(Auth::user()->id)->companies->id;
                $jumlah_jobs = Jobs::where('company_id', $company_id)->count();
                $jumlah_seekers = Jobs::where('company_id', $company_id)->join('applications', 'jobs.id', '=', 'applications.job_id')->count();
                $company = Companies::find($company_id);
                $jobIds = $company->jobs->pluck('id');
                $jumlah_diterima = Applications::whereIn('job_id', $jobIds)->where('status', 'accepted')->count();
                $jumlah_ditolak = Applications::whereIn('job_id', $jobIds)->where('status', 'rejected')->count();
                if ($perusahaan == '') {
                    return view('company.partials.dashboard', [
                        'title' => 'Dashboard',
                        'perusahaan' => $perusahaan,
                        'peringatan' => 'Silahkan Lengkapi Profil Perusahaan Anda!'
                    ]);
                } else {
                    return view('company.partials.dashboard', [
                        'title' => 'Dashboard',
                        'perusahaan' => $perusahaan,
                        'jumlah_jobs' => $jumlah_jobs,
                        'jumlah_seekers' => $jumlah_seekers,
                        'jumlah_diterima' => $jumlah_diterima,
                        'jumlah_ditolak' => $jumlah_ditolak,
                        'peringatan' => null
                    ]);
                }
            } elseif ($role == 'user') {
                $jobs = Jobs::all(); // Retrieve all jobs from the database
                return view('seeker.layout.master', compact('jobs'));
            } else {
                return redirect()->back();
            }
        } else {
            $jobs = Jobs::all();
            return view('welcome', compact('jobs'));
        }
    }
}
