<?php

use App\Http\Controllers\BasketController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BackofficeController;

Route::get('/', [homeController::class, 'show'])->name('home');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/basket', [BasketController::class, 'index'])->name('basket.cart');


//préfixation en "backoffice" de toutes les routes qui suivront
Route::prefix('backoffice')->group(function () {
    //route pointant vers la fonction "dashboard" du BackofficeController et affichant la viex "dashboard"
    Route::get('/', [BackofficeController::class, 'dashboard'])->name('backoffice.dashboard');
    //route pointant vers la fonction "products" du BackofficeController et affichant la view "index"
    Route::get('/products', [BackofficeController::class, 'products'])->name('backoffice.products');
    //route pointant vers la fonction "create" du BackofficeController et affichant la View create
    Route::get('/products/create', [BackofficeController::class, 'createProduct'])->name('backoffice.products.create');
    Route::post('/products', [BackofficeController::class, 'storeProduct'])->name('backoffice.products.store');
    Route::get('/products/{id}/edit', [BackofficeController::class, 'editProduct'])->name('backoffice.products.edit');
    Route::put('/products/{id}', [BackofficeController::class, 'updateProduct'])->name('backoffice.products.update');
    Route::delete('/products/{id}', [BackofficeController::class, 'deleteProduct'])->name('backoffice.products.delete');
});
