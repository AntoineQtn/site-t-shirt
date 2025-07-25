<?php

namespace App\Http\Controllers;
use App\Models\ProductsModel;

class ProductController extends Controller
{

  public function index()
  {
      $products = ProductsModel::all(); // récupère tous les produits
      return view('products', compact('products'));
   //$title = "T-Shirt produit";
  //return view('product');


}
public function show(int $id)
    {
        //$title = "T-Shirt produit";
        //return view('products.show');
        $product = ProductsModel::findOrFail($id);
        return view('products.show', compact('product'));
    }
}



























