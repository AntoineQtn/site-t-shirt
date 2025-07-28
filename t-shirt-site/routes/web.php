<?php

use App\Http\Controllers\BasketController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BackofficeController;

Route::get('/', [homeController::class, 'show']);
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/basket/cart', [BasketController::class, 'cart'])->name('basket.cart');


Route::prefix('backoffice')->group(function () {
    Route::get('/', [BackofficeController::class, 'dashboard'])->name('backoffice.dashboard');
    Route::get('/products', [BackofficeController::class, 'products'])->name('backoffice.products');
    Route::get('/products/create', [BackofficeController::class, 'createProduct'])->name('backoffice.products.create');
    Route::post('/products', [BackofficeController::class, 'storeProduct'])->name('backoffice.products.store');
    Route::get('/products/{id}/edit', [BackofficeController::class, 'editProduct'])->name('backoffice.products.edit');
    Route::put('/products/{id}', [BackofficeController::class, 'updateProduct'])->name('backoffice.products.update');
    Route::delete('/products/{id}', [BackofficeController::class, 'deleteProduct'])->name('backoffice.products.delete');
});
