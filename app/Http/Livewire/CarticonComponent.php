<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\CartIconService; // ✅ Use the correct namespace

class CarticonComponent extends Component
{
    protected $cartIconService;
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function __construct()
    {
        $this->cartIconService = new CartIconService(); // ✅ No subfolder issue now
    }

    public function remove($id)
    {
        $this->cartIconService->removeItem($id);
        flash('Cart item has been removed');
        $this->emitTo('cart-component', 'refreshComponent');
    }

    public function render()
    {
        return view('livewire.carticon-component');
    }
}
