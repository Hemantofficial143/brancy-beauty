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

    public function index()
    {
        $products = $this->modelObject->list(['with_pagination' => true,'per_page' => 9]);
        return view('user.product.list',['products' => $products]);
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
