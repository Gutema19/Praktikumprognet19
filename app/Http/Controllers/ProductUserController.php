<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Respon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ProductUserController extends Controller
{
    public function show(Product $product)
    {
        $reviews = $product->reviews()->get();
        $reviewCount = $product->reviews()->count();
        $rate = [
            '1' => $reviews->where('rate', 1)->count(),
            '2' => $reviews->where('rate', 2)->count(),
            '3' => $reviews->where('rate', 3)->count(),
            '4' => $reviews->where('rate', 4)->count(),
            '5' => $reviews->where('rate', 5)->count(),
        ];
        if (!auth()->check()) {
            return view('user.product-detail', compact('product', 'reviews', 'reviewCount', 'rate'));
        }
        $isHasReview = $product->reviews()->where('user_id', auth()->user()->id)->where('product_id', $product->id)->count() > 0;
        $user = Admin::all();
        $message = "Produk anda sudah diulas oleh pembeli" . Auth::guard('web')->user()->name . "";

        Notification::send($user, new AdminNotification($message));
        return view('user.product-detail', compact('product', 'reviews', 'rate', 'reviewCount', 'isHasReview'));
    }
    
    public function storeReview(Request $request, Product $product)
    {
        if ($product->reviews()->where('user_id', auth()->user()->id)->count() > 0) return redirect()->back();

        $request->validate([
            'content' => 'required|min:10',
            'rating' => 'required|numeric|min:1|max:5',
        ]);

        $product->reviews()->create([
            'user_id' => auth()->user()->id,
            'content' => $request->content,
            'rate' => $request->rating,
        ]);

        return redirect()->back();
    }

    public function buyNow(Product $product)
    {
        return view('user.transaction.buy-now', compact('product'));
    }

    public function search(Request $request)
    {
        $products = Product::where('name', 'LIKE', '%' . $request->name . '%')->get();
        return view('user.product.search', compact('products'));
    }
}
