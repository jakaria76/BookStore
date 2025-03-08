<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart; // Make sure you're using the correct facade

class WishlistComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];
    public function moveToCart($id)
    {
        // Retrieve the item from the wishlist cart instance
        $cart = Cart::instance('wishlist')->content()->get($id);
        Cart::instance('wishlist')->remove($id);
        Cart::instance('cart')->add($cart->id, $cart->name, 1, $cart->price)->associate('App\Models\Product');
        $this->emitTo('wishlist-icon-component','refreshComponent');
        $this->emitTo('carticon-component','refreshComponent');
        flash('Wishlist Item has been moved to cart.');


    }

    public function removewishlistProduct($id)
    {
        Cart::instance('wishlist')->remove($id);
        $this->emitTo('wishlist-icon-component','refreshComponent');
        flash('Wishlist Item has been removed');

    }

    public function render()
    {
        return view('livewire.wishlist-component');
    }
}
