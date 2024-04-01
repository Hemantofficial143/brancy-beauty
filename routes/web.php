<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\User\AboutUsController;
use \App\Http\Controllers\User\HomeController;
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

Route::get('/',[HomeController::class,'index'])->name('home');

Route::resource('about-us',AboutUsController::class);