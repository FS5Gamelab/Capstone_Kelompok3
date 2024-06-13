<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    // public function update(Request $request): RedirectResponse
    // {
    //     $validated = $request->validateWithBag('updatePassword', [
    //         'current_password' => ['required', 'current_password'],
    //         'password' => ['required', Password::defaults(), 'confirmed'],
    //     ]);

    //     $request->user()->update([
    //         'password' => Hash::make($validated['password']),
    //     ]);

    //     return back()->with('status', 'password-updated');
    // }

    public function update(Request $request)
    {

        $validated = $this->validate($request, [
            'password' => ['required', Password::defaults(), 'confirmed'],
            'password_confirmation' => ['required']
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return redirect('/company-profile')->with('status', 'Password Telah di Perbarui');
    }
}
