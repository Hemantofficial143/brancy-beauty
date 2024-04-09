<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[\App\Http\Controllers\User\HomeController::class,'index'])->name('home');

Route::resource('about-us',\App\Http\Controllers\User\AboutUsController::class);

Route::get('products',[\App\Http\Controllers\User\ProductController::class,'index'])->name('product.list');
Route::get('products/{slug}',[\App\Http\Controllers\User\ProductController::class,'detail'])->name('product.detail');

Route::get('blogs',[\App\Http\Controllers\User\BlogController::class,'index'])->name('blog.list');
Route::get('blogs/{slug}',[\App\Http\Controllers\User\BlogController::class,'detail'])->name('blog.detail');

Route::post('cart-add',[\App\Http\Controllers\User\CartController::class,'add'])->name('cart.add');


