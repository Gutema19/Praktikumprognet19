<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class regctrl1 extends Controller
{
    //
    public function index()
    {
        return view('register1', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function verification(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5|regex:/^[a-zA-Z ]{1,}$/',
            'email' => 'required|email:dns',
            'password' => 'required|min:8',
            'confirm_password' => 'required_with:password|min:8|same:password'
        ]);
    }
}
