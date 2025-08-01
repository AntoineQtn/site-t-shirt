<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Route de test de l'API
Route::get('/', function () {
    return response()->json([
        'message' => 'API Produits - Version 1.0.0',
        'endpoints' => [
            'GET /api/products' => 'Liste tous les produits avec leurs catégories',
            'GET /api/products/{id}' => 'Affiche un produit spécifique avec sa catégorie',
            'POST /api/products' => 'Crée un nouveau produit',
            'PUT /api/products/{id}' => 'Met à jour un produit existant',
            'DELETE /api/products/{id}' => 'Supprime un produit'
        ]
    ]);
});

// Routes pour les produits
Route::apiResource('products', ProductController::class);

// Routes supplémentaires utiles
Route::get('products/category/{categoryId}', [ProductController::class, 'getByCategory']);
Route::get('products/search/{term}', [ProductController::class, 'search']);

// Route fallback pour gérer les 404
Route::fallback(function () {
    return response()->json([
        'success' => false,
        'message' => 'Endpoint non trouvé',
        'error' => 'L\'URL demandée n\'existe pas'
    ], 404);
});
