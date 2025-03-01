<?php

namespace App\Services;

use Gloudemans\Shoppingcart\Facades\Cart;

class CartIconService
{
    public function removeItem($rowId)
    {
        Cart::instance('cart')->remove($rowId);
    }
}
