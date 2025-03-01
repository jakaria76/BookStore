<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;


class CartComponent extends Component

{

    protected $listeners=['refreshComponent'=>'$refresh'];

    public function increaseQuantity($value)
    {
      $product=Cart::instance('cart')->get($value);
      $qty=$product->qty+1;
      Cart::instance('cart')->update($value,$qty);
      $this->emitTo('carticon-component','refreshComponent');
    }


    public function decreaseQuantity($value)
    {
      $product=Cart::instance('cart')->get($value);
      $qty=$product->qty-1;
      Cart::instance('cart')->update($value,$qty);
      $this->emitTo('carticon-component','refreshComponent');
    }


    public function destory($id)
    {
      Cart::instance('cart')->remove($id);
      flash('Cart item has been remove');
      $this->emitTo('carticon-component','refreshComponent');
    }


    public function clearcart()
    {
        Cart::instance('cart')->destroy();
        flash('All cart items has been remove');
        $this->emitTo('carticon-component','refreshComponent');

    }

    public function render()
    {
        return view('livewire.cart-component');
    }
}