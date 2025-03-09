<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;
use App\Models\Product;

class CategoryComponent extends Component
{
    use WithPagination;

    public $slug;
    public $pagesize = 12;
    public $orderBy = 'Default Sorting';
    public $min_price = 0;
    public $max_price = 1000;

    protected $paginationTheme = 'bootstrap';

    public function mount($slug)
    {
        $this->slug = $slug;
    }

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
        $category = Category::where('slug', $this->slug)->first();

        if (!$category) {
            return collect([]); // Return empty collection if category not found
        }

        $query = Product::where('category_id', $category->id)
            ->whereBetween('sale_price', [$this->min_price, $this->max_price]);

        switch ($this->orderBy) {
            case 'Price: Low to High':
                $query->orderBy('sale_price', 'asc');
                break;
            case 'Price: High to Low':
                $query->orderBy('sale_price', 'desc');
                break;
            case 'Product By Newness':
                $query->orderBy('created_at', 'desc');
                break;
        }

        return $query->paginate($this->pagesize);
    }

    public function getLatestProduct()
    {
        return Product::latest()->take(1)->get();
    }

    public function getCategoryName()
    {
        $category = Category::where('slug', $this->slug)->first();
        return $category ? $category->name : 'Unknown Category';
    }

    public function render()
    {
        return view('livewire.category-component', [
            'categories' => $this->getCategories(),
            'products' => $this->getProducts(),
            'nproducts' => $this->getLatestProduct(),
            'categoryName' => $this->getCategoryName(),
        ]);
    }
}
