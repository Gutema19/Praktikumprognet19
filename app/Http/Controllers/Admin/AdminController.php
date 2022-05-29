<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;

class AdminController extends Controller
{
     public function index()
    {
        $admin = Admin::all();
        return view('admin.admin.index', compact('admin'));
    }

    public function notification(){
        $notification = Auth::guard('admin')->user()->notifications;

        return view('admin.notification', compact('notification'));
    }

    public function add()
    {
        return view('admin.admin.add');
    }

    public function addprocess(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:admins',
            'name' => 'required',
            'phone' => 'required|unique:admins|string|max:15',
        ]);

        $user = new \App\Models\Admin;
        $user->username = $request->username;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->password = bcrypt('password');
        $user->save();

        return redirect('admin/list')->with('status', 'Data Admin Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $admin = DB::table('admins')->where('id', $id)->first();
        return view('admin.admin.edit', compact('admin'));
    }

     public function editprocess(Request $request, $id)
    {
        $request->validate([
            'username' => "required|unique:admins,username,$id",
            'name' => 'required',
            'phone' => "required|string|max:15|unique:admins,phone,$id",
        ]);

        DB::table('admins')->where('id', $id)
            ->update([
            'username' => $request->username,
            'name' => $request->name,
            'phone' => $request->phone,
            ]);
             return redirect('admin/list')->with('status', 'Data Admin Berhasil Teredit!');
    }
    public function delete($id)
    {
        DB::table('admins')->where('id', $id)->delete();
        return redirect()-> route('admin.listadmin');
    }
}
