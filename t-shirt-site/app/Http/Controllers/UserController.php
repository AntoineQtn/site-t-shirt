<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
     // Lister tous les utilisateurs
    public function index()
    {
        $users = User::all();
        return view('backoffice.users.index', compact('users'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        return view('backoffice.users.create');
    }

    // Enregistrer un nouvel utilisateur
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('backoffice.users.index')->with('success', 'Utilisateur créé.');
    }

    // Afficher un utilisateur
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('backoffice.users.show', compact('user'));
    }

    // Formulaire d'édition
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('backoffice.users.edit', compact('user'));
    }

    // Mise à jour utilisateur
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('backoffice.users.index')->with('success', 'Utilisateur mis à jour.');
    }

    // Supprimer un utilisateur
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('backoffice.users.index')->with('success', 'Utilisateur supprimé.');
    }
}
