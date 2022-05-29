<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Product_category;
use App\Models\Product_category_detail;
use Livewire\Component;

class ProductLivewire extends Component
{
    // use WithPagination;

    // protected $paginationTheme = 'bootstrap';
    
    public $search;
    
    public $byCategory = null;

    public function render()
    {
        // $products = Product::where('product_name', 'like', '%' . $this->search . '%')->paginate(8);

        $products = Product_category_detail::when($this->byCategory, function($query){ $query->where('product_id',$this->byCategory);
        })->paginate(8);
        $categories = Product_category::all();
        return view('livewire.product', compact('products','categories'));
    }

    public function addToCart($id)
    {
        if (!auth()->check()) {
            return redirect()->route('user_login');
        }
        $cart = Cart::whereUserId(auth()->user()->id)->whereProductId($id)->first();
        if ($cart) {
            $cart->qty++;
            $cart->save();
        } else {
            Cart::create([
                'user_id' => auth()->user()->id,
                'product_id' => $id,
                'qty' => 1,
                'status' => 'Dalam Keranjang'
            ]);
        }
        $this->emit('addedToCart');
        session()->flash('message', 'Product success added to cart');
    }
}
