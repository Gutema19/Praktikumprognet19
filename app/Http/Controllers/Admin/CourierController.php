<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Courier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourierController extends Controller
{
    public function index()
    {
        $courier = Courier::all();
        return view('admin.courier.index', compact('courier'));
    }

    public function add()
    {

        return view('admin.courier.add');
    }

    public function addprocess(Request $request)
    {
        $courier = new Courier();

        $courier->courier = $request->courier;
        $courier->save();

        return redirect()->route('admin.listcourier');

    }

    public function edit($id)
    {
        $courier = DB::table('couriers')->where('id', $id)->first();
        return view('admin.courier.edit', compact('courier'));
    }

    public function editprocess(Request $request, $id)
    {

        DB::table('couriers')->where('id', $id)
            ->update([
            'courier' => $request->courier,
            ]);
            return redirect()->route('admin.listcourier');
    }

    public function delete($id)
    {
        DB::table('couriers')->where('id', $id)->delete();
        return redirect()-> route('admin.listcourier');
    }
}
