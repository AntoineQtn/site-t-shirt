<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule; // Pour la validation unique sur l'email

class ProfileController extends Controller
{
    /**
     * Affiche le formulaire d'édition du profil.
     */
    public function edit()
    {
        // L'utilisateur authentifié est automatiquement disponible via Auth::user()
        // et sera passé à la vue implicitement dans ce cas.
        // Ou vous pouvez le passer explicitement :
        $user = Auth::user();
        return view('auth.edit', compact('user'));
    }

    /**
     * Met à jour les informations du profil.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // Règles de validation
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id), // L'email doit être unique, sauf pour l'utilisateur actuel
            ],
            // Ajoutez d'autres champs si nécessaire (ex: 'role' si modifiable par l'utilisateur)
        ]);

        // Mise à jour des informations
        $user->name = $request->name;
        $user->email = $request->email;
        // Si vous avez d'autres champs comme 'role', ne les mettez à jour que s'ils
        // sont destinés à être modifiés par l'utilisateur via ce formulaire.
        // N'oubliez pas le mass assignment ($fillable) dans le modèle User si vous utilisez ->update()

        $user->save();

        // Redirection avec un message flash
        return redirect()->route('profile.edit')->with('status', 'Profil mis à jour avec succès !');
    }

    /**
     * Met à jour le mot de passe de l'utilisateur.
     * C'est souvent une méthode séparée pour des raisons de sécurité.
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'], // Vérifie le mot de passe actuel
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('status', 'Mot de passe mis à jour !');
    }
}
