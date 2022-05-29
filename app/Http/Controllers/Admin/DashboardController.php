<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
    * Handle the incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        $transactions = Transaction::select(
                    DB::raw("COUNT(*) as count"), 
                    DB::raw("MONTHNAME(created_at) as month_name"))
        
        ->whereYear('created_at', date('Y'))
        
        ->groupBy(DB::raw("MONTHNAME(created_at)"))
        ->get();
        
        foreach($transactions as $row) {
            $data['label'][] = $row->month_name;
            $data['data'][] = (int) $row->count;
        }

        $data['chart_data'] = json_encode($data);
        
        return view('admin.dashboard', $data);
    }
}