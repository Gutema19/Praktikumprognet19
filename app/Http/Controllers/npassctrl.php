<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class npassctrl extends Controller
{
    public function index($token)
    {
        return view('user.forget_password.fgnpass', ['token' => $token]);
    }

    public function npass(Request $request)
    {

        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'confirm_password' => 'required_with:password|min:8|same:password',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'confirm_password', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

    public function index1($token)
    {
        return view('admin.forget_password.fgnpass', ['token' => $token]);
    }


    public function adminnpass(Request $request)
    {

        $request->validate([
            'token' => 'required',
            'username' => 'required|email',
            'password' => 'required|min:8',
            'confirm_password' => 'required_with:password|min:8|same:password',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'confirm_password', 'token'),
            function ($admin, $password) {
                $admin->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $admin->save();

                event(new PasswordReset($admin));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('admin_login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
