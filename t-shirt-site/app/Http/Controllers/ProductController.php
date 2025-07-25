<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\View\View;
use App\Models\Products;

use Illuminate\Http\Request;

class ProductController extends Controller
{
  
  public function index()
  {
   $title = "T-Shirt produit";
  return view('product');
  

}

public function show()
{
    $products = Products::all(); // récupère tous les produits
    return view('products', compact('products'));
}




}



























