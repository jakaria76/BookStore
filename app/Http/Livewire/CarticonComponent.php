<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart; // Merged directly into the component

class CarticonComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function remove($id)
    {
        $this->removeItem($id); // Merged method
        flash('Cart item has been removed');
        $this->emitTo('cart-component', 'refreshComponent');
    }

    // Merged method from CartIconService
    public function removeItem($rowId)
    {
        Cart::instance('cart')->remove($rowId);
    }

    public function render()
    {
        return view('livewire.carticon-component');
    }
}
