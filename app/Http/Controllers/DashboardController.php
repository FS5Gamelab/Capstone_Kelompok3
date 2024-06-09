<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $role = Auth::user()->role;
            if ($role == 'company') {
                return view('company.partials.dashboard',['title' => 'Dashboard']);
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
