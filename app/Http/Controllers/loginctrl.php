<?php

namespace App\Http\Controllers;

use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginctrl extends Controller
{
    // User territory
    public function index()
    {
        return view('user.login', [
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
            return response()->json([], 200);
            return redirect()->route('homeuser');
        } else {
            return response()->json(['message' => 'The provided credentials do not match our records'], 400);
        }
    }

    // Admin territory
    public function index1()
    {
        return view('admin.adminlog', [
            'title' => 'Admin Login',
            'active' => 'login'
        ]);
    }

    public function adminauth(Request $request)
    {

        $credentials = $request->validate([
            'username' => 'required|min:5',
            'password' => 'required|min:8'
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.listadmin');
        
        } else {
            return response()->json(['message' => 'The provided credentials do not match our records'], 400);
        }
    }
}
