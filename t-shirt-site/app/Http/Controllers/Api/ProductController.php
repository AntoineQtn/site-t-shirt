<?php

// app/Http/Controllers/Api/ProductController.php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    /**
     * API JSON retournant l'ensemble des produits avec les informations sur leur catégories
     */
    public function index(): JsonResponse
    {
        try {
            $products = Product::with('category')
                ->where('is_active', true)
                ->paginate(15);

            return response()->json([
                'success' => true,
                'message' => 'Liste des produits récupérée avec succès',
                'data' => ProductResource::collection($products),
                'pagination' => [
                    'current_page' => $products->currentPage(),
                    'last_page' => $products->lastPage(),
                    'per_page' => $products->perPage(),
                    'total' => $products->total()
                ]
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la récupération des produits',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * API JSON retournant un produit avec les informations sur sa catégorie
     */
    public function show(Product $product): JsonResponse
    {
        try {
            $product->load('category');

            return response()->json([
                'success' => true,
                'message' => 'Produit récupéré avec succès',
                'data' => new ProductResource($product)
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la récupération du produit',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * API JSON permettant d'ajouter un produit
     */
    public function store(StoreProductRequest $request): JsonResponse
    {
        try {
            $product = Product::create($request->validated());
            $product->load('category');

            return response()->json([
                'success' => true,
                'message' => 'Produit créé avec succès',
                'data' => new ProductResource($product)
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la création du produit',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * API JSON permettant de modifier un produit
     */
    public function update(UpdateProductRequest $request, Product $product): JsonResponse
    {
        try {
            $product->update($request->validated());
            $product->load('category');

            return response()->json([
                'success' => true,
                'message' => 'Produit mis à jour avec succès',
                'data' => new ProductResource($product)
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la mise à jour du produit',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * API JSON permettant de supprimer un produit
     */
    public function destroy(Product $product): JsonResponse
    {
        try {
            $productName = $product->name;
            $product->delete();

            return response()->json([
                'success' => true,
                'message' => "Le produit '{$productName}' a été supprimé avec succès"
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression du produit',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
