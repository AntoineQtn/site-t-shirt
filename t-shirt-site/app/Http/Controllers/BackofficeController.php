<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class BackofficeController extends Controller
{
    public function index()
    {
        return view('backoffice.dashboard');
    }

    public function products()
    {
        $products = Product::all();
        return view('backoffice.products.index', compact('products'));
    }

    public function create()
    {
        return view('backoffice.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prix' => 'required|numeric|min:0',
        ]);

        Product::create($request->only(['nom', 'prix']));

        return redirect()->route('backoffice.products.index')->with('success', 'Produit ajouté');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('backoffice.products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('backoffice.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prix' => 'required|numeric|min:0',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->only(['nom', 'prix']));

        return redirect()->route('backoffice.products.index')->with('success', 'Produit mis à jour');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('backoffice.products.index')->with('success', 'Produit supprimé');
    }
}
