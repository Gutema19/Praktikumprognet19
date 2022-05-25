<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Courier;
use Livewire\Component;
use App\Models\Province;

class CartListLivewire extends Component
{
    public $provinces;
    public array $selectedItems;

    public function render()
    {
        $carts = Cart::with('product')->whereUserId(auth()->user()->id)->whereStatus('Dalam Keranjang')->get();
        $this->provinces = Province::all();
        $couriers = Courier::all('courier', 'id');
        return view('livewire.cart-list', compact('carts', 'couriers'));
    }

    public function deleteItem($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        $this->emit('itemDeleted');
    }

    public function decrementQty($id)
    {
        $cart = Cart::find($id);
        if ($cart->product->stock > 0) {
            if ($cart->qty > 1) {
                $cart->qty -= 1;
                $cart->product->stock += 1;
                $cart->save();
            } else {
                $this->deleteItem($id);
            }
        }

        $this->emit('itemDecremented');
    }

    public function incrementQty($id)
    {
        $cart = Cart::find($id);
        $cart->qty += 1;
        $cart->product->stock -= 1;
        $cart->save();
        $this->emit('itemIncremented');
    }

    public function checkout()
    {
        // $setOfIds = $model->manyStuff->pluck('id')->toArray();

        // $this->selectedItems = array_fill_keys($setOfIds, true);

        // $this->manyStuff = $model->manyStuff;
        return redirect()->route('checkout');
    }
}
