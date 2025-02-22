<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;
class ShopComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {

        $categories = Category::get();
        $products =Product::paginate(12);

        return view('livewire.shop-component',['categories'=>$categories,'products'=>$products]);
    }
}
