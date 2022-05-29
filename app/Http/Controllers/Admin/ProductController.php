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
        $product = Product::all();
        return view('admin.product.index', compact('product'));
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

        return redirect()->route('admin.listproduct');

    }

    public function edit($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        return view('admin.product.edit', compact('product'));
    }

    public function editprocess(Request $request, $id)
    {


        DB::table('products')->where('id', $id)
            ->update([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'description' => $request->description,
            'stock' => $request->stock,
            'weight' => $request->weight,
            ]);
            return redirect()->route('admin.listproduct');
    }

    public function delete($id)
    {
        DB::table('products')->where('id', $id)->delete();
        return redirect()-> route('admin.listproduct');
    }

    public function listReviewProduct($id)
    {
        $data = Product::find($id);
        $reviews = $data->reviews;
        return view('admin.product.review', compact('data', 'reviews'));
    }

    public function responseReview(Request $request, $id)
    {
        $response = Response::whereReviewId($id)->get();
        if (!$response->count() >= 0 && !$response->count() < 1) {
            return redirect()->back()->with('danger', 'Response hanya dapat sekali.');
        }
        Response::create([
            'review_id' => $id,
            'admin_id' => auth()->user('admin')->id,
            'content' => $request->content
        ]);

        return redirect()->back()->with('success', 'Response berhasil ditambahkan.');
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
