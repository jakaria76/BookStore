<?php

namespace App\Services;

use Gloudemans\Shoppingcart\Facades\Cart;

class WishlistComponentService
{
    /**
     * Move item from wishlist to cart.
     *
     * @param string $id
     * @return void
     */
    public function moveToCart($id)
    {
        $cartItem = Cart::instance('wishlist')->content()->get($id);
        if ($cartItem) {
            Cart::instance('wishlist')->remove($id);
            Cart::instance('cart')->add(
                $cartItem->id,
                $cartItem->name,
                1,
                $cartItem->price
            )->associate('App\Models\Product');
        }
    }

    /**
     * Remove item from wishlist.
     *
     * @param string $id
     * @return void
     */
    public function removeWishlistProduct($id)
    {
        Cart::instance('wishlist')->remove($id);
    }
}
