<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\CartService;

class CartComponent extends Component
{
    protected $cartService;
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function __construct()
    {
        $this->cartService = new CartService();
    }

    public function increaseQuantity($value)
    {
        $this->cartService->increaseQuantity($value);
        $this->emitTo('carticon-component', 'refreshComponent');
    }

    public function decreaseQuantity($value)
    {
        $this->cartService->decreaseQuantity($value);
        $this->emitTo('carticon-component', 'refreshComponent');
    }

    public function destory($id)
    {
        $this->cartService->removeItem($id);
        flash('Cart item has been removed');
        $this->emitTo('carticon-component', 'refreshComponent');
    }

    public function clearcart()
    {
        $this->cartService->clearCart();
        flash('All cart items have been removed');
        $this->emitTo('carticon-component', 'refreshComponent');
    }

    public function render()
    {
        return view('livewire.cart-component');
    }
}
