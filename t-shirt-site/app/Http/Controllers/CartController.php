<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

  public function add(Request $request)
    {
        $id = $request->input('id');
        $nom = $request->input('nom');
        $prix = $request->input('prix');

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantite'] += 1;
            $cart[$id]['prix'] = $prix;
        } else {
            $cart[$id] = [
                'nom' => $nom,
                'prix' => $prix,
                'quantite' => 1
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart')->with('success', 'Produit ajouté au panier !');
    }

    // Modifier la quantité d'un article dans le panier
    public function update(Request $request, $id)
    {
        $quantite = intval($request->input('quantite', 1));
        if ($quantite < 1) {
            $quantite = 1; // minimum 1
        }

        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantite'] = $quantite;
            session()->put('cart', $cart);
            return redirect()->route('cart')->with('success', 'Quantité mise à jour !');
        }
        return redirect()->route('cart')->with('error', 'Produit non trouvé dans le panier.');
    }

    // Vider complètement le panier
    public function clear()
    {
        session()->forget('cart');
        return redirect()->route('cart')->with('success', 'Panier vidé avec succès !');
    }

}
