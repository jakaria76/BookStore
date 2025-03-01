<?php

namespace App\Services\CartIconService;

use Gloudemans\Shoppingcart\Facades\Cart;

class CartIconService
{
    public function removeItem($rowId)
    {
        Cart::instance('cart')->remove($rowId);
    }
}
