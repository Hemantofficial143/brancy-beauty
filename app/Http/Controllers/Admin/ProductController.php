<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Irfan\LaravelUniqueSlug\Facades\UniqueSlug;

class ProductController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $request->all();
        $products = new Product();
        $products = $products->paginate(10);
        return view('admin.product.list', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = null;
        return view('admin.product.create', ['product' => $product]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'mrp' => ['required'],
            'price' => ['required'],
            'category' => ['required'],
        ]);


        $product = new Product();
        $product->title = $data['title'];
        $product->slug = UniqueSlug::generate(new Product(), $product->title, 'slug');
        $product->description = $data['description'];
        $product->mrp = $data['mrp'];
        $product->price = $data['price'];
        $product->status = $data['status'] == 'ACTIVE' ? true : false;
        $product->category_id = $data['category'];
        $product->tags = !empty($data['tags']) ? $data['tags'] : null;
        $product->save();

        if (!empty($data['images']) && is_array($data['images'])) {
            $fileUploadObj = new FileHelper();
            foreach ($data['images'] as $oneImage) {
                $file = $oneImage;
                $productImage = new ProductImage();
                $productImage->product_id = $product->id;
                $productImage->image = $fileUploadObj->uploadFile('products', $file);
                $productImage->save();
            }
        }
        return ['success' => true, 'data' => $product, 'message' => 'Product created successfully.'];
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
        //
    }
}
