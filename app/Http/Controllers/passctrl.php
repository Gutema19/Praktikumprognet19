<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class passctrl extends Controller
{
    //
    public function index()
    {
        return view('pass1', [
            'title' => 'Password',
            'active' => 'password'
        ]);
    }

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
}
