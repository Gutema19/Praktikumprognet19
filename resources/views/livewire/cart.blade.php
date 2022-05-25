<div class="cart-block">
    <div class="cart-total">
        <span class="text-number">
            {{ $cart_count }}
        </span>
        <span class="text-item">
            Shopping Cart
        </span>
        <span class="price">
           Rp. {{ number_format($price_total, 2, ',', '.') }}
        </span>
    </div>
</div>