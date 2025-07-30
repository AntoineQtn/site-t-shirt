<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Affiche tous les produits triés par nom
    public function listByName()
    {
        $products = Product::orderBy('name')->get();
        return view('products.by_name', compact('products'));
    }

    // Affiche tous les produits triés par prix croissant
    public function listByPrice()
    {
        $products = Product::orderBy('price', 'asc')->get();
        return view('products.by_price', compact('products'));
    }

    // Affiche le détail d’un produit spécifique
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }
}
