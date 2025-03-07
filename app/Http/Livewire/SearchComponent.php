<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;
use App\Models\Product;

class SearchComponent extends Component
{
    use WithPagination;

    public $pagesize = 12;
    public $orderBy = 'Default Sorting';
    public $min_price = 0;
    public $max_price = 1000;

    public $search;
    public $search_term;

    public function mount()
    {
        $this->fill(request()->only('search'));
        $this->search_term='%'.$this->search.'%';
    }

    protected $paginationTheme = 'bootstrap';

    public function changepageSize($size)
    {
        $this->pagesize = $size;
    }

    public function ChangeOrderBy($order)
    {
        $this->orderBy = $order;
    }

    public function getCategories()
    {
        return Category::all();
    }

    public function getProducts()
    {
        if ($this->orderBy == 'Price: Low to High') {
            return Product::where('name','like',$this->search_term)->whereBetween('sale_price', [$this->min_price, $this->max_price])
                ->orderBy('sale_price', 'asc')
                ->paginate($this->pagesize);
        } elseif ($this->orderBy == 'Price: High to Low') {
            return Product::where('name','like',$this->search_term)->whereBetween('sale_price', [$this->min_price, $this->max_price])
                ->orderBy('sale_price', 'desc')
                ->paginate($this->pagesize);
        } elseif ($this->orderBy == 'Product By Newness') {
            return Product::where('name','like',$this->search_term)->whereBetween('sale_price', [$this->min_price, $this->max_price])
                ->orderBy('created_at', 'desc')
                ->paginate($this->pagesize);
        } else {
            return Product::where('name','like',$this->search_term)->whereBetween('sale_price', [$this->min_price, $this->max_price])
                ->paginate($this->pagesize);
        }
    }

    public function getLatestProduct()
    {
        return Product::latest()->take(1)->get();
    }

    public function render()
    {
        return view('livewire.search-component', [
            'categories' => $this->getCategories(),
            'products' => $this->getProducts(),
            'nproducts' => $this->getLatestProduct()
        ]);
    }
}
