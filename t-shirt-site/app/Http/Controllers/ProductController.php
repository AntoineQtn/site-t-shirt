<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\View\View;
use App\Models\Products;

use Illuminate\Http\Request;

class ProductController extends Controller
{

  public function index()
  {
      $products = Products::all(); // récupère tous les produits
      return view('products', compact('products'));
   //$title = "T-Shirt produit";
  //return view('product');


}
public function show($id)
    {
        $title = "T-Shirt produit";
        return view('products.show');
        //$product = ProductModel::findOrFail($id);
        //return view('products.product-detail', compact('product'));
    }
}



























