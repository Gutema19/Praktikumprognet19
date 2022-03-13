<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class verfy extends Controller
{
    //

    public function index1()
    {
        return view('verify1', [
            'title' => 'Verify',
            'active' => 'verify'
        ]);
    }

    public function index2()
    {
        return view('fgverify', [
            'title' => 'Verifypass',
            'active' => 'verifypass'
        ]);
    }
}
