<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Afficher le panier
    public function index()
    {
        $cartItems = CartItem::with('product')
            ->where('user_id', Auth::id())
            ->get();

        $total = $cartItems->sum('total');

        return view('cart.index', compact('cartItems', 'total'));
    }

    // Ajouter un produit au panier
    public function add(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'integer|min:1|max:100'
        ]);

        $quantity = $request->get('quantity', 1);

        $cartItem = CartItem::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            // Mettre à jour la quantité si l'article existe déjà
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            // Créer un nouvel article
            CartItem::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'quantity' => $quantity,
                'price' => $product->price
            ]);
        }

        return redirect()->back()->with('success', 'Produit ajouté au panier !');
    }

    // Mettre à jour la quantité
    public function update(Request $request, CartItem $cartItem)
    {
        $this->authorize('update', $cartItem);

        $request->validate([
            'quantity' => 'required|integer|min:1|max:100'
        ]);

        $cartItem->updateQuantity($request->quantity);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'total' => $cartItem->total,
                'cartTotal' => CartItem::where('user_id', Auth::id())->get()->sum('total')
            ]);
        }

        return redirect()->back()->with('success', 'Quantité mise à jour !');
    }

    // Supprimer un article du panier
    public function remove(CartItem $cartItem)
    {
        $this->authorize('delete', $cartItem);

        $cartItem->delete();

        if (request()->ajax()) {
            return response()->json(['success' => true]);
        }

        return redirect()->back()->with('success', 'Produit retiré du panier !');
    }

    // Vider le panier
    public function clear()
    {
        CartItem::where('user_id', Auth::id())->delete();

        return redirect()->back()->with('success', 'Panier vidé !');
    }

    // Compter les articles du panier (pour la navbar)
    public function count()
    {
        $count = CartItem::where('user_id', Auth::id())->sum('quantity');

        return response()->json(['count' => $count]);
    }
}
