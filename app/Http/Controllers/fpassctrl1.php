<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class fpassctrl1 extends Controller
{
    //
    public function index()
    {
        return view('fgpass1', [
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
}
