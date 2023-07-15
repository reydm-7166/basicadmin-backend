<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Admin\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;

class ShowProductController extends Controller
{
    // use dependency injection
    public function __construct(
      protected ProductService $productService
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): Response|ResponseFactory
    {
        return Inertia('User/Product', [
            'products' => $this->productService->getAllProducts($request),
            'search' => $request->input('search') ?? '',
        ]);
    }
}
