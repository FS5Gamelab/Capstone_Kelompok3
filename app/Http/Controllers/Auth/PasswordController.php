<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    

    public function update(Request $request)
    {

        $this->validate($request, [
            'email' => ['required', 'email'],
            'password' => ['required', Password::defaults(), 'confirmed','min:8'],
            'password_confirmation' => ['required']
        ]);

        $request->user()->update([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/company-profile')->with('status', 'Password / Email Telah di Perbarui');
    }
}
