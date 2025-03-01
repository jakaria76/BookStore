<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Product;

class ProductService
{
    public function getCategories()
    {
        return Category::all();
    }

    public function getProducts($orderBy, $pageSize)
    {
        if ($orderBy == 'Price: Low to High') {
            return Product::orderBy('sale_price', 'asc')->paginate($pageSize);
        } elseif ($orderBy == 'Price: High to Low') {
            return Product::orderBy('sale_price', 'desc')->paginate($pageSize);
        } elseif ($orderBy == 'Product By Newness') {
            return Product::orderBy('created_at', 'desc')->paginate($pageSize);
        } else {
            return Product::paginate($pageSize);
        }
    }

    public function getLatestProduct()
    {
        return Product::latest()->take(1)->get();
    }
}
