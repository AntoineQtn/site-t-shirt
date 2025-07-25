<?php

use App\Http\Controllers\ProductListController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/homepage', [homeController::class, 'show']);

Route::get('/product-list', [ProductListController::class, 'show']);
Route::get('/cart', [CartController::class, 'show']);
Route::get('/product', [ProductController::class, 'index']);
Route::get('/products', [ProductController::class, 'show']);
