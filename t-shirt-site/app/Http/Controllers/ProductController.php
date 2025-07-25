<?php
namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = ProductModel::all();
        return view('product-list', compact('products'));
    }

    public function show($id)
    {
        $product = ProductModel::findOrFail($id);
        return view('products.product-detail', compact('product'));
    }
}



























