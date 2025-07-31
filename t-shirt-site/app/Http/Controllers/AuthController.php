<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Affiche le formulaire de connexion.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Traite la tentative de connexion.
     */
    public function login(Request $request)
    {
        // Validation des champs
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        // Tentative de connexion
        if (Auth::attempt($credentials)) {
            // Regénérer la session pour éviter les attaques de fixation de session
            $request->session()->regenerate();

            // Rediriger vers l’URL prévue ou la page backoffice
            return redirect()->intended('/backoffice');
        }

        // Retourner en arrière avec un message d’erreur
        return back()->withErrors([
            'email' => 'Identifiants incorrects.',
        ])->onlyInput('email'); // Préserve le champ email dans le formulaire
    }

    /**
     * Déconnexion de l’utilisateur.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
