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
        if (!empty($data['q'])) {
            $products = $products->where('title', 'like', "%" . $data['q'] . "%");
        }

        if (!empty($data['min']) && !empty($data['max'])) {
            $products = $products->where('price', '>=', $data['min'])->where('price', '<=', $data['max']);
        }

        if (!empty($data['cat'])) {
            $products = $products->where('category_id', '=', $data['cat']);
            $countClone = clone $products;
        }

        $products = $products->paginate(9);

        $minMaxAmount = [
            'min' => !empty($data['cat']) ? Product::where('category_id',$data['cat'])->min('price') : Product::min('price'),
            'max' => !empty($data['cat']) ? Product::where('category_id', $data['cat'])->max('price') : Product::max('price')
        ];
        $selectedMinMax = [
            'min' => !empty($data['min']) && !empty($data['max']) ? $data['min'] : $minMaxAmount['min'],
            'max' => !empty($data['min']) && !empty($data['max']) ? $data['max'] : $minMaxAmount['max']
        ];


        return view('user.product.list', ['products' => $products, 'amount' => $minMaxAmount, 'selectedMinMax' => $selectedMinMax]);
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
