<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class CarticonComponent extends Component
{

    protected $listeners=['refreshComponent'=>'$refresh'];

    public function remove($id)
    {
        Cart::instance('cart')->remove($id);
        flash('Cart item has been removed');
        $this->emitTo('cart-component','refreshComponent'); 
    }
    public function render()
    {
        return view('livewire.carticon-component');
    }
}