<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function index(){
        $cart = ProductsModel::all();
        return view('basket.index', compact('cart'));
    }
    public function show(int $id): View
    {
        $cart = ProductsModel::all();
        return view('basket.cart', compact('cart'));
    }
}
