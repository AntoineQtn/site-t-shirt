<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FormController;

// Page principale (homepage)
Route::get('/', [HomeController::class, 'show'])->name('homepage');

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

// pour le back  ofiice

// Formulaire d’ajout
Route::get('/admin/products/create', [ProductController::class, 'create']);
Route::post('/admin/products', [ProductController::class, 'store']);

// Formulaire de modification
Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit']);
Route::put('/admin/products/{id}', [ProductController::class, 'update']);
Route::get('/admin/products', [App\Http\Controllers\ProductController::class, 'adminIndex'])->name('admin.products.index');
Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.products.store');


// Backoffice maid l'admin
Route::get('/admin/products', [ProductController::class, 'adminIndex'])->name('admin.products.index');
Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.products.store');
Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('admin.products.update');


