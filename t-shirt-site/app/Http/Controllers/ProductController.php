<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = ProductsModel::all();
        return view('product.products', compact('products'));
    }

    public function show(int $id)
    {
        $product = ProductsModel::findOrFail($id);
        return view('show', compact('product'));
    }
}

















