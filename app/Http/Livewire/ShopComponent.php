<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;
class ShopComponent extends Component
{
    use WithPagination;

    public $pagesize=12;


    public $orderBy='Default Shorting';

    protected $paginationTheme = 'bootstrap';

    public function changepageSize($size)
    {
        $this->pagesize=$size;
    }

    public function ChangeOrderBy($order)
    {
        $this->orderBy=$order;
    }


    public function render()
    {

        $categories = Category::get();


        if($this->orderBy=='Price: Low to High')

        {
            $products=Product::orderBy('sale_price','asc')->paginate($this->pagesize);
        }elseif($this->orderBy=='Price: High to Low')
        {
            $products=Product::orderBy('sale_price','desc')->paginate($this->pagesize);
        }elseif($this->orderBy=='Product By Newness')
        {
            $products=Product::orderBy('created_at','desc')->paginate($this->pagesize);
        }else{
            $products =Product::paginate($this->pagesize);
        }



        $nproducts = Product::latest()->take(1)->get();

        return view('livewire.shop-component',['categories'=>$categories,'products'=>$products,'nproducts'=>$nproducts]);
    }
}
