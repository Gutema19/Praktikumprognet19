<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class verfy extends Controller
{
    //

    public function index1()
    {
        return view('user.register.verify1', [
            'title' => 'Verify',
            'active' => 'verify'
        ]);
    }

    public function index2()
    {
        return view('user.forget_password.fgverify', [
            'title' => 'Verifypass',
            'active' => 'verifypass'
        ]);
    }
}
