<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FormController;

// Page d'accueil
Route::get('/', function () {
    return view('welcome');
});

// Page principale (homepage)
Route::get('/homepage', [HomeController::class, 'show'])->name('homepage');

// Produits
Route::prefix('produits')->group(function () {
    Route::get('/nom', [ProductController::class, 'listByName'])->name('products.byName');
    Route::get('/prix', [ProductController::class, 'listByPrice'])->name('products.byPrice');
});

// Détail d’un produit
Route::get('/produit/{id}', [ProductController::class, 'show'])->name('products.show');

// Panier
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::put('/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/{id}', [CartController::class, 'remove'])->name('cart.remove');
});

// Paiement (checkout)
Route::get('/checkout', function () {
    return 'Page de paiement...';
})->name('checkout');

// Formulaire
Route::get('/form', [FormController::class, 'showForm']);
Route::post('/form', [FormController::class, 'handleForm'])->name('form.submit');


Route::get('/products/name', [ProductController::class, 'listByName']);
Route::get('/products/price', [ProductController::class, 'listByPrice']);
Route::get('/products/{id}', [ProductController::class, 'show']);
