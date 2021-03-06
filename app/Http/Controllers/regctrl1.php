<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class regctrl1 extends Controller
{
    //
    public function index()
    {
        return view('user.register.register1', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function verification(Request $request)
    {
        $validateuser = $request->validate([
            'name' => 'required|min:5|regex:/^[a-zA-Z ]{1,}$/',
            'email' => 'required|email:dns',
            'password' => 'required|min:8',
            'confirm_password' => 'required_with:password|min:8|same:password'
        ]);

        if ($validateuser) {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
        }

        return redirect()->route('verif1.request');
    }


    public function index2()
    {
        return view('admin.register.adminreg', [
            'title' => 'Admin Register',
            'active' => 'register'
        ]);
    }

    public function adminregis(Request $request)
    {
        $validateadmin = $request->validate([
            'name' => 'required|min:5|regex:/^[a-zA-Z ]{1,}$/',
            'username' => 'required|min:5|unique:admins',
            'phone' => 'required|min:12|max:15|regex:/^([0-9\s\-\+\(\)]*)$/',
            'password' => 'required|min:8',
            'confirm_password' => 'required_with:password|min:8|same:password'
        ]);

        if ($validateadmin) {
            Admin::create([
                'name' => $request->name,
                'username' => $request->username,
                'phone' => $request->phone,
                'password' => bcrypt($request->password),
                'remember_token' => Str::random(60),
            ]);
        }

        return redirect()->route('admin.admin_login');
    }
}
