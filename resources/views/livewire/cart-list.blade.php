<!-- Cart Page Start -->
<div class="cart_area cart-area-padding  ">
    <div class="container">
        <div class="page-section-title">
            <h1>Shopping Cart</h1>
        </div>
        <div class="row">
            <div class="col-12">
                {{-- <form action="#" class=""> --}}
                    <!-- Cart Table -->
                    <div class="cart-table table-responsive mb--40">
                        <table class="table">
                            <!-- Head Row -->
                            <thead>
                                <tr>
                                    <th class="pro-remove">Checklist</th>
                                    <th class="pro-remove">Delete</th>
                                    <th class="pro-thumbnail">Image</th>
                                    <th class="pro-title">Product</th>
                                    <th class="pro-price">Price</th>
                                    <th class="pro-quantity">Quantity</th>
                                    <th class="pro-subtotal">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($carts as $cart)
                                    
                                <!-- Product Row -->
                                <tr>
                                    <td>
                                        <input type="checkbox" wire:click="checklist">
                                    </td>
                                    <td class="pro-remove"><a wire:click='deleteItem({{ $cart->id }})'
                                        class="text-gray-32 font-size-26"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                    <td class="pro-thumbnail"><a href="#"><img
                                                src="{{ asset('assets/image/products/product-1.jpg') }}" alt="Product"></a></td>
                                    <td class="pro-title"><a href="#">{{ $cart->product->product_name }}</a></td>
                                    <td class="pro-price">
                                        <span>
                                        @if ($cart->product->discount)
                                            <div>
                                                <ins class="text-red text-decoration-none">Rp.
                                                    {{ number_format($cart->product->price_discount(), 2, ',', '.') }}</ins>
                                                <del class="tex-gray-6 " style="bottom: 75%">Rp.
                                                    {{ number_format($cart->product->price, 2, ',', '.') }}</del>
                                            </div>
                                        @else
                                            <span class="">Rp
                                                {{ number_format($cart->product->price, 2, ',', '.') }}</span>
                                        @endif    
                                        </span>
                                    </td>
                                    <td data-title="Quantity" class="pro-quantity">
                                        <span class="sr-only">Quantity</span>
                                        <!-- Quantity -->
                                        <div class="border rounded-pill ">
                                            <div class="js-quantity row align-items-center">
                                                <div class="col-auto ">
                                                    <button wire:click="decrementQty({{ $cart->id }})"
                                                        class=" btn btn-icon btn-xs btn-outline-secondary border-0">
                                                        <small class="fas fa-minus btn-icon__inner"></small>
                                                    </button>
            
                                                </div>
                                                <div class="col">
                                                    <input
                                                        class="form-control h-auto border-0 rounded p-0 shadow-none bg-transparent"
                                                        type="text" disabled value="{{ $cart->qty }}">
                                                </div>
                                                <div class="col-auto pl-1">
                                                    <button wire:click="incrementQty({{ $cart->id }})"
                                                        class="btn btn-icon btn-xs btn-outline-secondary border-0">
                                                        <small class="fas fa-plus btn-icon__inner"></small>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Quantity -->
                                    </td>
                                    <td data-title="Total" class="pro-subtotal">
                                        <span class="">Rp
                                            {{ number_format(($cart->product->discount ? $cart->product->price_discount() : $cart->product->price) * $cart->qty, 2, ',', '.') }}</span>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Cart Empty</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if ($carts->count() > 0)
                        <div class="mb-5 d-flex justify-content-center">
                            <button type="button" wire:click='checkout' wire:loading.attr="disabled"
                                class="btn btn-primary mb-3 mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5 w-100 w-md-auto checkout-btn c-btn btn--primary">Checkout</button>
                        </div>
                    @endif
                {{-- </form> --}}
            </div>
        </div>
    </div>
</div>