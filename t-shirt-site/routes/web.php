<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BackofficeController;

Route::get('/', [homeController::class, 'show'])->name('home');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/cart', [BasketController::class, 'index'])->name('cart.cart');


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

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

//routes pour les utilisateurs
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
//routes admin qui renvoient au backoffice
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/cart/update/{cartItem}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{cartItem}', [CartController::class, 'remove'])->name('cart.remove');
    Route::delete('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::get('/cart/count', [CartController::class, 'count'])->name('cart.count');
});
