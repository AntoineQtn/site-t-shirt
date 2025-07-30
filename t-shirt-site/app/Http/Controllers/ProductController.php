<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Affiche tous les produits triés par nom
    public function listByName()
    {
        $products = Product::orderBy('name')->get();
        return view('products.by_name', compact('products'));
    }

    // Affiche tous les produits triés par prix croissant
    public function listByPrice()
    {
        $products = Product::orderBy('price', 'asc')->get();
        return view('products.by_price', compact('products'));
    }

    // Affiche le détail d’un produit spécifique
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }
  
public function create()
{
    return view('admin.products.create');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|string',
        'marque' => 'nullable|string',
        'disponibilite' => 'boolean',
        'quantite' => 'required|integer|min:0',
        'price' => 'required|numeric|min:0',
    ]);

    Product::create($validated);

    return redirect()->route('admin.products.index')->with('success', 'Produit ajouté avec succès.');

}

public function edit($id)
{
    $product = Product::findOrFail($id);
    return view('admin.products.edit', compact('product'));
}

public function update(Request $request, $id)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|string',
        'marque' => 'nullable|string',
        'disponibilite' => 'boolean',
        'quantite' => 'required|integer|min:0',
        'price' => 'required|numeric|min:0',
    ]);

    $product = Product::findOrFail($id);
    $product->update($validated);

    return redirect('/products/name')->with('success', 'Produit modifié avec succès.');
}
public function adminIndex()
{
    $products = \App\Models\Product::orderBy('created_at', 'desc')->get();
    return view('admin.products.index', compact('products'));
}


}
