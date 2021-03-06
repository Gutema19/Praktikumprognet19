<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\UserNotification;
use Illuminate\Support\Facades\Notification;

class TransactionResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $transactions = Transaction::with('user', 'courier', 'products')->orderBy('created_at', 'DESC');
        if($request->year){
          $transactions->whereYear('created_at',$request->year);
        }
        if($request->month){
          $transactions->whereMonth('created_at',$request->month);
        }
        $transactions = $transactions->paginate(10);
      
      
      return view('admin.transaction.index')->with(compact('transactions'));
        // $transactions = Transaction::with('user', 'courier', 'products')->orderBy('created_at', 'DESC')->get();
        // return view('admin.transaction.index', compact('transactions'));
    }

    /**
     * To accept payment
     *
     * @param Transaction $transaction
     * @return void
     */
    public function acceptPayment($id, Transaction $data)
    {
        $data =  Transaction::find($id);
        $data->update([
            'status' => 'Dalam Pengiriman'
        ]);
        $user = User::find($data->user_id);
        $message = "Transaksi".  $user->name . ", telah dikirim dan dalam pengiriman";

        Notification::send($user, new UserNotification($message));
        return redirect()->route('admin.transaction.index')->with('success', 'Transaction has been accepted');
    }

    public function updateShipped(Transaction $transaction)
    {
        $transaction->update([
            'status' => 'Telah Sampai'
        ]);

        $user = User::find($transaction->user_id);
        $message = "Paket".  $user->name . ", telah sampai";

        Notification::send($user, new UserNotification($message));
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