<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller

{
public function showForm()
    {
        $lastUsers = \App\Models\User::latest()->take(3)->get(); // pour afficher les 3 derniers comptes
        return view('auth.account', ['lastUsers' => $lastUsers]);
    }

    public function register(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Création de l'utilisateur
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Connexion automatique (facultatif)
        auth()->login($user);

        return redirect('/backoffice')->with('success', 'Compte créé avec succès.');
    }
}
