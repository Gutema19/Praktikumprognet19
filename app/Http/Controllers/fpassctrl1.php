<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;

class fpassctrl1 extends Controller
{
    //
    public function index()
    {
        return view('user.forget_password.fgpass1', [
            'title' => 'Forget Password',
            'active' => 'forget_pass'
        ]);
    }

    public function mailv(Request $request)
    {
        $request->validate(['email' => 'required|email:dns|max:255|string']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function index1()
    {
        return view('admin.forget_password.fgpass1', [
            'title' => 'Admin Forget Password',
            'active' => 'forget_pass'
        ]);
    }

    public function adminv(Request $request)
    {
        $credentials = $request->validate(['username' => 'required|min:5|exists:admins']);

        if ($credentials) {
            return redirect()->route('anewpassword.request');
        }
        /*if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->view('/admin');
        } else {
            return response()->json(['message' => 'The provided credentials do not match our records'], 400);
        }*/
    }
}
