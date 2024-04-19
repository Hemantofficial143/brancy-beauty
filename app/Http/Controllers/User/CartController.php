<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Jackiedo\Cart\Facades\Cart;

class CartController extends Controller
{


    public function index()
    {
        return view('user.cart');
    }

    public function add(Request $request)
    {

        $product = Product::where('id',$request->product_id)->first();
        $cart = Cart::name('shopping')->addItem([
            'id' => $product->id,
            'title' => $product->title,
            'qty' => $request->qty,
            'price' => $product->price
        ]);
        return "Added To Cart";
    }
}
