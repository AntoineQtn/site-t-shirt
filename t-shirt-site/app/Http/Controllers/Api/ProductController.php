<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
      $products=Product::with('category')->get(); // elle récupére tous les produits de la base de données avec leur categorie associée
                                                  // get exécute la requéte et retourne tous les résultats sous forme de collection laravel

        return response()->json ($products);// elle renvoie une réponse HTTP au format Json contenant les données de $products .On appelle une API json.
    }
}
