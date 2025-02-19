<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class ShopComponent extends Component
{
    public function render()
    {

        $categories = Category::get();


        return view('livewire.shop-component',['categories'=>$categories]);
    }
}
