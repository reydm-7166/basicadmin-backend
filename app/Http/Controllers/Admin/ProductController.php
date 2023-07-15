<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct(
        protected ProductService $productService
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return Inertia('Admin/Product/Product', [
            'products' => $this->productService->getAllProducts($request),
            'search' => $request->input('search') ?? '',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Admin/Product/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $storeProductRequest): \Illuminate\Http\RedirectResponse
    {
       $storeProductRequest->validated();

        $stored = $this->productService->createProduct($storeProductRequest);

        if(!$stored){
            return redirect()->back()->with(['create' => 'false']);
        }
        return redirect()->route('product.index')->with(['create' => 'true']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return inertia('Admin/Product/View',[
            'product' => $this->productService->getProductById($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        dd("edit" . $id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = $this->productService->deleteProductById($id);
        if(!$delete){
            return redirect()->back()->with(['delete' => 'false']);
        }
        return redirect()->route('product.index')->with(['delete' => 'true']);
    }
}
