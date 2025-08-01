<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Affiche le formulaire d'inscription et les 3 derniers comptes créés.
     */
    public function showForm()
    {
        $lastUsers = User::latest()->take(3)->get();
        return view('auth.account', ['lastUsers' => $lastUsers]);
    }

    /**
     * Enregistre un nouvel utilisateur dans la base de données.
     */
    public function register(Request $request)
    {            
        dd($request->all()); 
        // Validation des données du formulaire
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Création de l'utilisateur
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Connexion automatique de l'utilisateur
        Auth::login($user);

        // Redirection vers le backoffice avec un message de succès
        return redirect('/backoffice')->with('success', 'Compte créé avec succès.');
    }
}
