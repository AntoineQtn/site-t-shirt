<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // Affiche la liste des catégories
    public function index()
    {
        $categories = Category::all();
        return view('backoffice.categories.index', compact('categories'));
    }

    // Affiche le formulaire de création
    public function create()
    {
        return view('backoffice.categories.create');
    }

    // Enregistre une nouvelle catégorie
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('backoffice.categories.index')->with('success', 'Catégorie ajoutée.');
    }

    // Affiche une catégorie (optionnel ici)
    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        return view('backoffice.categories.show', compact('category'));
    }

    // Affiche le formulaire d'édition
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('backoffice.categories.edit', compact('category'));
    }

    // Met à jour une catégorie existante
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('backoffice.categories.index')->with('success', 'Catégorie mise à jour.');
    }

    // Supprime une catégorie
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('backoffice.categories.index')->with('success', 'Catégorie supprimée.');
    }
}
