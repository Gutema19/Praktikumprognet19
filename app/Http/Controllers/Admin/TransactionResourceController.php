<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::with('user', 'courier', 'products')->orderBy('created_at', 'DESC')->get();
        return view('admin.transaction.index', compact('transactions'));
    }

    /**
     * To accept payment
     *
     * @param Transaction $transaction
     * @return void
     */
    public function acceptPayment(Transaction $transaction)
    {
        $transaction->update([
            'status' => 'Dalam Pengiriman'
        ]);

        return redirect()->route('admin.transaction.index')->with('success', 'Transaction has been accepted');
    }

    public function updateShipped(Transaction $transaction)
    {
        $transaction->update([
            'status' => 'Telah Sampai'
        ]);

        return redirect()->route('admin.transaction.index')->with('success', 'Transaction has been shipped');
    }


    public function cancelTransaction(Transaction $transaction)
    {
        if (auth()->user()->id !== $transaction->user_id) {
            return abort(404);
        }
        $transaction->update([
            'status' => 'Dibatalkan'
        ]);
        return redirect()->route('admin.transaction.index')->with('success', 'Transaction has been cancelled');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
