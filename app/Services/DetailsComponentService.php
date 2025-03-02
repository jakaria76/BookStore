<?php

namespace App\Services;

use Gloudemans\Shoppingcart\Facades\Cart;

class DetailsComponentService
{
    public function addItemToCart($productId, $productName, $productPrice)
    {
        Cart::instance('cart')->add($productId, $productName, 1, $productPrice)->associate('App\Models\Product');
    }
}
