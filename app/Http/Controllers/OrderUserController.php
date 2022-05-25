<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class OrderUserController extends Controller
{
    public function index()
    {
        // list order user
        $transactions = Transaction::whereUserId(auth()->user()->id)->orderBy('created_at', 'desc')->get();
        return view('user.order.index', compact('transactions'));
    }
}