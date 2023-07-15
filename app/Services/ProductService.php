<?php

namespace App\Services;

use App\Models\Product;
use App\Services\Contracts\CreateProductServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Carbon\Carbon;

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
    public function getProductById($id)
    {
        return $this->product->findOrFail($id);
    }
    public function getAllCategories() : Collection
    {
        return $this->product->distinct()->pluck('category');
    }

    public function deleteProductById($id)
    {
        return $this->product->findOrFail($id)->delete();
    }

    public function createProduct($product)
    {
        $convertedImageFileName = $this->fileRename($product->image);

        $converted_date = Carbon::parse($product->date_time)->format('Y-m-d H:i:s');

        return $this->product->create([
            'name' => $product->name,
            'category' => $product->category,
            'description' => $product->description,
            'image_file_name' => $convertedImageFileName,
            'date_time' => $converted_date,
        ]);
    }
    public function fileRename($rawFiles)
    {
        $filePaths = [];

        foreach ($rawFiles as $imageName) {
            // get the name of the image
            $image = $imageName->getClientOriginalName();

            //gets the name only not including file extension
            $tempoName = pathinfo($image, PATHINFO_FILENAME);

            //new image name
            $newImageName = time() . '_' . $tempoName . '.' . $imageName->getClientOriginalExtension();

            //move the image to public folder
            $imageName->move(base_path('\storage\app\product-images'), $newImageName);

            $filePaths[] = $newImageName;
        }
        return json_encode($filePaths);
    }
}