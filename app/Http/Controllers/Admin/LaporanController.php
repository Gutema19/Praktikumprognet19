<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class LaporanController extends Controller
{
    function index(Request $request)
    {
        if(request()->ajax())
        {
            if(!empty($request->from_date))
            {
                $data = Transaction::whereBetween('created_at', array($request->from_date, $request->to_date))
                ->get();
            }
            else
            {
                $data = Transaction::all();
                
            }
            return Datatables::of($data)->make(true);
        }
        return view('admin.laporan.index');
    }
    
}