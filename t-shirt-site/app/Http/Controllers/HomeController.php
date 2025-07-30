<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show()
    {
        return view("homepage");
    }

    public function index()
    {
        $promoActive = true;
        return view('homepage', compact('promoActive'));
    }
}
