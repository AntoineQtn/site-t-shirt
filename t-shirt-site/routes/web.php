<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BackofficeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backoffice\OrderController;
use App\Http\Controllers\Backoffice\CategoryController;

// Page d'accueil
Route::get('/', function () {
    return view('welcome');
});

// Page d'accueil personnalisée
Route::get('/homepage', [homeController::class, 'index'])->name('homepage');
Route::get('/homepage', [homeController::class, 'show']);

// Produits (côté client)
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show'])->name('show');

// Panier
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/increase/{id}', [CartController::class, 'increase'])->name('cart.increase');
Route::post('/cart/decrease/{id}', [CartController::class, 'decrease'])->name('cart.decrease');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

// Authentification
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/login-custom', [LoginController::class, 'login'])->name('login.custom');

// Compte utilisateur
Route::get('/account', [AccountController::class, 'showForm'])->name('account');
Route::post('/account', [AccountController::class, 'register'])->name('account.submit');

// Backoffice - tableau de bord
Route::get('/backoffice', [BackofficeController::class, 'index'])->name('backoffice');

// Backoffice - produits
Route::prefix('backoffice/products')->name('backoffice.products.')->group(function () {
    Route::get('/', [BackofficeController::class, 'products'])->name('index');
    Route::get('/create', [BackofficeController::class, 'create'])->name('create');
    Route::post('/', [BackofficeController::class, 'store'])->name('store');
    Route::get('/{id}', [BackofficeController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [BackofficeController::class, 'edit'])->name('edit');
    Route::put('/{id}', [BackofficeController::class, 'update'])->name('update');
    Route::delete('/{id}', [BackofficeController::class, 'destroy'])->name('destroy');
});

// Backoffice - utilisateurs
Route::prefix('backoffice/users')->name('backoffice.users.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/', [UserController::class, 'store'])->name('store');
    Route::get('/{id}', [UserController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
    Route::put('/{id}', [UserController::class, 'update'])->name('update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
});

// Backoffice - commandes
Route::prefix('backoffice')->name('backoffice.')->group(function () {
    Route::resource('orders', OrderController::class);
});

// Backoffice - catégories
Route::prefix('backoffice')->name('backoffice.')->group(function () {
    Route::resource('categories', CategoryController::class);
});


