<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $role = Auth()->user()->role;
            if ($role == 'admin') {
                return view('admin.main');
            } else if ($role == 'user') {
                return view('dashboard');
            } else {
                return redirect()->back();
            }
        }
    }

    public function post(){
        return 'iki post';
    }
}
