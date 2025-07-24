<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\View\View;


use Illuminate\Http\Request;

class ProductController extends Controller
{
  
  public function index()
  {
   $title = "T-Shirt produit";
  return view('product');
  

}
}


























