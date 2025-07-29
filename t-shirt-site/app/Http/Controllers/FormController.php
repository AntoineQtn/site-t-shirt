<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    // Affiche le formulaire
    public function showForm()
    {
        return view('form');
    }

    // Traite le formulaire après soumission
    public function handleForm(Request $request)
    {
        // Validation simple (optionnel)
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        // Récupère les données validées
        $data = $validated;

        // Passe les données à la vue de confirmation
        return view('form-result', compact('data'));
    }
}
