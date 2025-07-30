<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

//Controller pour l'enregistrement de nouvelles données dans la table users
class RegisterController extends Controller
{
    //gestion de la view
    public function showRegistrationForm()
    {
        return view('auth.register');
    }
    //gestion de la requête du formulaire avec vérification des données et création de l'item
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);
        //appel de la méthode login
        Auth::login($user);

        return redirect('/dashboard');
    }
}
