<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function showForm()
    {
        return view('form');
    }

 public function handleForm(Request $request)
{
    // Valider les données du formulaire
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
    ]);

    // Passer les données validées à la vue 'form-result'
    return view('form-result', ['data' => $validated]);
}
}
