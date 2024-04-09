<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->all();
        $products = new Product();
        $products = $products->paginate(9);
        $minMaxAmount = [
            'min' => 1,
            'max' => 1000
        ];
        return view('user.product.list', ['products' => $products, 'amount' => $minMaxAmount]);
    }

    public function detail($slug)
    {
        $product = Product::where('slug', $slug)->first();
        if (!$product) {
            return 'Invalid Product';
        }
        return view('user.product.detail', ['product' => $product]);

    }


}
