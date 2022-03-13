<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginctrl extends Controller
{
    public function index()
    {
        return view('login', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }


    public function authenticate(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|min:5',
            'password' => 'required|min:8'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/home');
        }

        return back()->withMessage([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
