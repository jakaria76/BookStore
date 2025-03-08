<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Gloudemans\Shoppingcart\Facades\Cart; // ✅ Import Cart directly

class DetailsComponent extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function Store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product'); // ✅ Add to cart directly
        return redirect()->route('cart');
    }


    public function addtoWishlist($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emitTo('wishlist-icon-component','refreshComponent');
        flash('wishlist item has been added');
    }


    public function removefromWishlist($productID)
    {
         foreach(Cart::instance('wishlist')->content() as $witem){
            if($witem->id==$productID){
               Cart::instance('wishlist')->remove($witem->rowId);
               $this->emitTo('wishlist-icon-component','refreshComponent');
               flash('wishlist item has been deleted');
            }
         }
    }


    public function render()
    {
        $product = Product::where("slug", $this->slug)->first();
        $image = $product->image;
        $images = json_decode($product->images);
        array_splice($images, 0, 0, $image);

        $rproducts = Product::where('category_id', $product->category_id)->get();
        $nproducts = Product::latest()->take(1)->get();
        $categories = Category::get();

        return view('livewire.details-component', [
            'product' => $product,
            'rproducts' => $rproducts,
            'nproducts' => $nproducts,
            'categoris' => $categories,
            'images' => $images
        ]);
    }
}
