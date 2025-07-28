<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Illuminate\Contracts\View\View;

class ProductController extends Controller
{

  public function index(): View
  {
      $products = ProductsModel::all();
      return view('product.index', compact('products'));

}
public function show(int $id): View
{
        $product = ProductsModel::findOrFail($id);
        return view('product.show', compact('product'));
    }
}



























