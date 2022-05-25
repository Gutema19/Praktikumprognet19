<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Product_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        foreach($products as $product){
            $product->image = $product->images->first();
        }
        return view('admin.product.index', compact('products'));
    }

    public function add()
    {

        return view('admin.product.add');
    }

    public function addprocess(Request $request)
    {
        $product = new Product;

        $product->product_name = $request->product_name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->weight = $request->weight;
        $product->product_rate = '0';
        $product->save();

        $image = new Product_image;

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $image['image_name']= $filename;
        }
        $image->product_id = $product->id;
        $image->save();

        return redirect()->route('admin.listproduct');

    }

    public function edit($id)
    {
        $image = Product_image::where('id', $id)->first();
        $product = DB::table('products')->where('id', $id)->first();
        return view('admin.product.edit', compact('product', 'image'));
    }

    public function editprocess(Request $request, $id)
    {


        $product = Product::find($id);
        $product->product_name = $request->product_name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->weight = $request->weight;
        $product->save();
        return redirect()->route('admin.listproduct');
    }

    public function editimage($id){
        $image = Product_image::where('product_id', $id)->first();
        return view('admin.product.product-image', compact('image'));
    }
    
    public function updateimage(Request $request, $id)
    {


        $image = Product_image::where('id', $id);
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $image['image_name']= $filename;
        }
        $image->save();
        return redirect()->route('admin.listproduct');
    }
    

    public function delete($id)
    {
        DB::table('products')->where('id', $id)->delete();
        return redirect()-> route('admin.listproduct');
    }

}

// $gambar = new Product_image;
//         $gambar->product_id = $product->id;
//         $image = $request->file('file');
//         $imageName = time() . '-' . $image->extension();
//         $image->move(public_path('images'),$imageName);
//         $gambar->image_name = $imageName;
//         $gambar->save();

//         return redirect('admin/product')->with('status', 'Data  Detail Kategori Detail Berhasil Ditambahkan!');
