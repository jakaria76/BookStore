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

    public function getProducts($orderBy, $pageSize, $min_price, $max_price)
    {
        if ($orderBy == 'Price: Low to High') {
            return Product::whereBetween('sale_price',[$this->$min_price,$this->$max_price])-> orderBy('sale_price', 'asc')->paginate($pageSize);
        } elseif ($orderBy == 'Price: High to Low') {
            return Product::whereBetween('sale_price',[$this->$min_price,$this->$max_price])-> orderBy('sale_price', 'desc')->paginate($pageSize);
        } elseif ($orderBy == 'Product By Newness') {
            return Product:: whereBetween('sale_price',[$this->$min_price,$this->$max_price])-> orderBy('created_at', 'desc')->paginate($pageSize);
        } else {
            return Product:: whereBetween('sale_price',[$min_price,$max_price])-> paginate($pageSize);
        }
    }

    public function getLatestProduct()
    {
        return Product::latest()->take(1)->get();
    }
}
