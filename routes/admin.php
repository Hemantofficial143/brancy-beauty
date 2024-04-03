<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Admin web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "admin" middleware group. Make something great!
|
*/

Route::get('/',function(){
    return redirect()->route('admin.login.index');
});


//Route::group(['middleware' => ['auth.admin.already']],function(){
    Route::get('/login',[\App\Http\Controllers\Admin\LoginController::class,'index'])->name('login.index');
    Route::post('/login-attempt',[\App\Http\Controllers\Admin\LoginController::class,'loginAttempt'])->name('login.attempt');
//});

//Route::group(['middleware' => ['auth.admin']],function(){
Route::get('/dashboard',[\App\Http\Controllers\Admin\DashboardController::class,'index'])->name('dashboard');
//});

Route::resource('dashboard',\App\Http\Controllers\Admin\DashboardController::class);

Route::resource('users',\App\Http\Controllers\Admin\UserController::class);

Route::resource('subscribers',\App\Http\Controllers\Admin\SubscriberController::class);

Route::resource('inquiries',\App\Http\Controllers\Admin\ContactUsController::class);

Route::resource('blogs',\App\Http\Controllers\Admin\BlogController::class);

Route::resource('promo-codes',\App\Http\Controllers\Admin\PromoCodeController::class);

Route::resource('categories',\App\Http\Controllers\Admin\CategoryController::class);

Route::resource('products',\App\Http\Controllers\Admin\ProductController::class);








