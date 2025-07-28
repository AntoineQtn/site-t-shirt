<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BackofficeController;

// Route page d'accueil
Route::get('/', function () {
    return view('welcome');
});

// Route vers la page d'accueil personnalisée
Route::get('/homepage', [homeController::class, 'show']);

// Route liste des produits
Route::get('/products', [ProductController::class, 'index']);

// Route affichage d’un produit en détail
Route::get('/products/{id}', [ProductController::class, 'show'])->name('show');



Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');




Route::get('/backoffice', function () {
    return view('backoffice.dashboard');
})->name('backoffice');
