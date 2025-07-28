<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackofficeController extends Controller
{
    public function index()
    {
        // Ici tu peux ajouter des données à passer à la vue si besoin
        return view('backoffice.dashboard');
    }
}
