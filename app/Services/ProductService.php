<?php

namespace App\Services;

use App\Models\Product;
use App\Services\Contracts\CreateProductServiceInterface;

class ProductService
{
    // use DI for the Product Model
    public function __construct
    (
        protected Product $product
    )
    {}
    public function getAllProducts()
    {
        return $this->product->paginate(12);
    }
}