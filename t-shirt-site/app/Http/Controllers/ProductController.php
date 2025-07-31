<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;

class ProductController extends Controller
{

  public function index(): View
  {
      $products = Product::all();
      return view('product.index', compact('products'));

}
public function show(int $id): View
{
        $product = Product::findOrFail($id);
        return view('product.show', compact('product'));
    }
}



























