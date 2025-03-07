<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Services\ProductService;

class ShopComponent extends Component
{
    use WithPagination;



    public $pagesize = 12;
    public $orderBy = 'Default Shorting';

    public $min_price=0;
    public $max_price=1000;

    protected $paginationTheme = 'bootstrap';

    protected $productService;

    public function __construct()
    {
        $this->productService = new ProductService();
    }

    public function changepageSize($size)
    {
        $this->pagesize = $size;
    }

    public function ChangeOrderBy($order)
    {
        $this->orderBy = $order;
    }

    public function render()
    {
        $categories = $this->productService->getCategories();
        $products = $this->productService->getProducts($this->orderBy, $this->pagesize, $this->min_price, $this->max_price);
        $nproducts = $this->productService->getLatestProduct();

        return view('livewire.shop-component', [
            'categories' => $categories,
            'products' => $products,
            'nproducts' => $nproducts
        ]);
    }
}
//caesium
