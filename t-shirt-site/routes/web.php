<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\ProductController;

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
