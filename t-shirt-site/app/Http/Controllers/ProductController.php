<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;

class ProductController extends Controller
{

    public function index()
    {
        $products = ProductsModel::all(); 
        $title = "Liste des T-Shirts";
        return view('products.index', compact('products', 'title'));
    }

  
    public function show(int $id)
    {
        $product = ProductsModel::findOrFail($id);
        $title = "Détail du produit"; 
        return view('products.show', compact('product', 'title'));
    }
}





















