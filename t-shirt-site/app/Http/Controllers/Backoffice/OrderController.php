<?php

namespace App\Http\Controllers\Backoffice;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\order;

class OrderController extends Controller
{
    // Affiche la liste des commandes
    public function index()
    {
        $orders = Order::all(); // Récupère toutes les commandes
        return view('backoffice.orders.index', compact('orders'));
    }

    // Affiche le formulaire de création
    public function create()
    {
        return view('backoffice.orders.create');
    }

    // Enregistre une nouvelle commande
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'total_price'    => 'required|numeric|min:0',
            'status'         => 'nullable|string|max:50',
            'address'        => 'nullable|string|max:255',
        ]);

        Order::create($request->all());

        return redirect()->route('backoffice.orders.index')->with('success', 'Commande créée avec succès.');
    }

    // Affiche une commande spécifique
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('backoffice.orders.show', compact('order'));
    }

    // Affiche le formulaire d'édition
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('backoffice.orders.edit', compact('order'));
    }

    // Met à jour une commande existante
    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'total_price'    => 'required|numeric|min:0',
            'status'         => 'nullable|string|max:50',
            'address'        => 'nullable|string|max:255',
        ]);

        $order = Order::findOrFail($id);
        $order->update($request->all());

        return redirect()->route('backoffice.orders.index')->with('success', 'Commande mise à jour avec succès.');
    }

    // Supprime une commande
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('backoffice.orders.index')->with('success', 'Commande supprimée avec succès.');
    }
}
