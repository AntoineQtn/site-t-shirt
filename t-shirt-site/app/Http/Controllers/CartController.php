<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    // Affiche le contenu du panier
    public function index()
    {
        // Récupérer le panier depuis la session, ou tableau vide par défaut
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    // Ajouter un produit au panier
    public function add(Request $request)
    {
        // Validation simplifiée des champs reçus
        $request->validate([
            'id' => 'required',
            'nom' => 'required|string|max:255',
            'prix' => 'required|numeric|min:0',
        ]);

        $id = $request->input('id');
        $nom = $request->input('nom');
        $prix = $request->input('prix');

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            // Si produit déjà dans le panier, incrémenter la quantité
            $cart[$id]['quantite']++;
            $cart[$id]['prix'] = $prix; // Mise à jour optionnelle du prix
        } else {
            // Sinon, ajout du produit avec quantité 1
            $cart[$id] = [
                'nom' => $nom,
                'prix' => $prix,
                'quantite' => 1,
            ];
        }

        // Enregistrer le panier modifié en session
        session()->put('cart', $cart);

        // Redirection vers la page panier avec message de succès
        return redirect()->route('cart')->with('success', 'Produit ajouté au panier !');
    }

    // Met à jour la quantité d'un produit dans le panier
    public function update(Request $request, $id)
    {
        $request->validate([
            'quantite' => 'required|integer|min:1',
        ]);

        $quantite = $request->input('quantite');
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantite'] = $quantite;
            session()->put('cart', $cart);

            return redirect()->route('cart')->with('success', 'Quantité mise à jour !');
        }

        return redirect()->route('cart')->with('error', 'Produit introuvable dans le panier.');
    }

    // Augmente la quantité d'un produit de 1
    public function increase($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantite']++;
            session()->put('cart', $cart);

            return redirect()->route('cart')->with('success', 'Quantité augmentée.');
        }

        return redirect()->route('cart')->with('error', 'Produit introuvable dans le panier.');
    }

    // Diminue la quantité d'un produit de 1 (supprime si atteint 0)
    public function decrease($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            if ($cart[$id]['quantite'] > 1) {
                $cart[$id]['quantite']--;
            } else {
                unset($cart[$id]);
            }
            session()->put('cart', $cart);

            return redirect()->route('cart')->with('success', 'Quantité diminuée.');
        }

        return redirect()->route('cart')->with('error', 'Produit introuvable dans le panier.');
    }

    // Supprime un produit du panier
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);

            return redirect()->route('cart')->with('success', 'Produit retiré du panier.');
        }

        return redirect()->route('cart')->with('error', 'Produit introuvable dans le panier.');
    }

    // Vide complètement le panier
    public function clear()
    {
        session()->forget('cart');
        return redirect()->route('cart')->with('success', 'Panier vidé avec succès !');
    }
}
