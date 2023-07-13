<?php

namespace App\Services;

use App\Models\Product;
use App\Services\Contracts\CreateProductServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ProductService
{
    // use DI for the Product Model
    public function __construct
    (
        protected Product $product
    )
    {}
    public function getAllProducts(Request $request)
    {
        return $this->product
            ->query()
            ->when($request->input('search'), function ($query, $search) {
                    $query->where('name', 'like', '%' .  $search . '%')
                          ->orWhere('description', 'like', '%' .  $search . '%');
            })
            ->paginate(12)
            ->withQueryString();
    }
    public function getAllCategories() : Collection
    {
        return $this->product->distinct()->pluck('category');
    }
}