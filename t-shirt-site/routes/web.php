<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BackofficeController;
use App\Http\Controllers\AuthController;


// Page d'accueil
Route::get('/', function () {
    return view('welcome');
});

// Page d'accueil personnalisée
Route::get('/homepage', [homeController::class, 'show']);

// Produits (côté client)
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show'])->name('show');

// Panier
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

// Backoffice - tableau de bord
Route::get('/backoffice', [BackofficeController::class, 'index'])->name('backoffice');

// Backoffice - produits (groupe avec préfixe + nom)
Route::prefix('backoffice/products')->name('backoffice.products.')->group(function () {
    Route::get('/', [BackofficeController::class, 'products'])->name('index');
    Route::get('/create', [BackofficeController::class, 'create'])->name('create');
    Route::post('/', [BackofficeController::class, 'store'])->name('store');
    Route::get('/{id}', [BackofficeController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [BackofficeController::class, 'edit'])->name('edit');
    Route::put('/{id}', [BackofficeController::class, 'update'])->name('update');
    Route::delete('/{id}', [BackofficeController::class, 'destroy'])->name('destroy');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protéger les routes backoffice
Route::middleware('auth')->prefix('backoffice')->group(function () {
    Route::get('/', [BackofficeController::class, 'index'])->name('backoffice.index');
    // ... autres routes ici
});