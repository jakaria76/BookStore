<?php

namespace App\Services;

use Gloudemans\Shoppingcart\Facades\Cart;

class CartService
{
    public function increaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
    }

    public function decreaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId, $qty);
    }

    public function removeItem($rowId)
    {
        Cart::instance('cart')->remove($rowId);
    }

    public function clearCart()
    {
        Cart::instance('cart')->destroy();
    }
}
