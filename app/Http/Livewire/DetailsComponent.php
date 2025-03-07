<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Services\DetailsComponentService; // ✅ Import the service

class DetailsComponent extends Component
{
    public $slug;
    protected $detailsComponentService; // Declare the service variable

    public function __construct()
    {
        $this->detailsComponentService = new DetailsComponentService(); // Initialize the service
    }

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function Store($product_id, $product_name, $product_price)
    {
        $this->detailsComponentService->addItemToCart($product_id, $product_name, $product_price); // Use the service
        return redirect()->route('cart');
    }

    public function render()
    {
        $product = Product::where("slug", $this->slug)->first();
        $image = $product->image;
        $images = json_decode($product->images);
        array_splice($images, 0, 0, $image);

        $rproducts = Product::where('category_id', $product->category_id)->get();
        $nproducts = Product::latest()->take(1)->get();
        $categories = Category::get(); //caesium

        return view('livewire.details-component', [
            'product' => $product,
            'rproducts' => $rproducts,
            'nproducts' => $nproducts,
            'categoris' => $categories,
            'images' => $images
        ]);
    }
}
