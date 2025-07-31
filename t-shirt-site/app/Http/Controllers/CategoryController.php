<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // Charge les catégories avec leurs produits liés
        $categories = Category::with('products')->get();

        // Retourne la vue admin.categories.index avec les données
        return view('admin.categories.index', compact('categories'));
    }
}
