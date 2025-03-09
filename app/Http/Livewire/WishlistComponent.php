<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\WishlistComponentService;

class WishlistComponent extends Component
{
    protected $wishlistService;

    public function __construct()
    {
        $this->wishlistService = app(WishlistComponentService::class);
    }

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function moveToCart($id)
    {
        $this->wishlistService->moveToCart($id);
        $this->emitTo('wishlist-icon-component', 'refreshComponent');
        $this->emitTo('carticon-component', 'refreshComponent');
        flash('Wishlist Item has been moved to cart.');
    }

    public function removewishlistProduct($id)
    {
        $this->wishlistService->removeWishlistProduct($id);
        $this->emitTo('wishlist-icon-component', 'refreshComponent');
        flash('Wishlist Item has been removed.');
    }

    public function render()
    {
        return view('livewire.wishlist-component');
    }
}
