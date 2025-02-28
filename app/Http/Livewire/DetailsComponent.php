<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category ;
use Gloudemans\Shoppingcart\Facades\Cart;



class DetailsComponent extends Component
{

    public $slug;
    public function mount($slug){
        $this->slug=$slug;
    }

    public function Store($product_id,$product_name,$product_price)
    {
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        return redirect()->route('cart');
    }
    public function render()
    {


        $product = Product::where("slug", $this->slug)->first();

        $rproducts=Product::where('category_id', $product->category_id)->get();

        $nproducts = Product::latest()->take(1)->get();
        $categories = Category::get();

        return view('livewire.details-component', ['product'=> $product,'rproducts'=>$rproducts ,'nproducts'=>$nproducts,'categoris'=>$categories]);
    }
}
