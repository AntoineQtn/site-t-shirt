<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // ➕ tu dois importer le modèle Product

class CartController extends Controller
{
    public function index()
    {
        $cart = collect(session()->get('cart', []));
        return view('cart', compact('cart'));
    }

    public function update(Request $request, $id)
    {
        // On récupère le produit pour connaître le stock
        $product = Product::findOrFail($id);

        // Validation avec limite de stock
        $validated = $request->validate([
            'quantity' => ['required', 'integer', 'min:1', 'max:' . $product->quantite],
        ]);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $validated['quantity'];
            session()->put('cart', $cart);
            session()->flash('success', 'Quantité mise à jour avec succès.');
        } else {
            session()->flash('error', 'Article introuvable dans le panier.');
        }

        return redirect()->route('cart.index');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
            session()->flash('success', 'Article retiré du panier.');
        } else {
            session()->flash('error', 'Article non trouvé dans le panier.');
        }

        return redirect()->route('cart.index');
    }
}
