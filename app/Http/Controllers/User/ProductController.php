<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->modelObject = new Product();
    }

    public function index(Request $request)
    {
        $data = $request->all();
        $data['with_pagination'] = true;
        $data['per_page'] = 9;
        $products = $this->modelObject->list($data);
        $minMaxAmount = [
            'min' => $this->modelObject->minAmount($data),
            'max' => $this->modelObject->maxAmount($data)
        ];
        return view('user.product.list',['products' => $products,'amount' => $minMaxAmount]);
    }

    public function detail($slug)
    {
        $product = $this->modelObject->getProductBySlug($slug);
        if(!$product){
            return 'Invalid Product';
        }
        return view('user.product.detail',['product' => $product]);

    }


}
