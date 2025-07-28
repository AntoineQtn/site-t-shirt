<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BackofficeController extends Controller
{
    public function dashboard()
    {
        $totalProducts = ProductsModel::count();
        $availableProducts = ProductsModel::where('available', true)->count();

        return view('backoffice.dashboard', compact('totalProducts', 'availableProducts'));
    }

    public function products(): View|Application|Factory
    {
        $products = ProductsModel::all();
        return view('backoffice.products.index', compact('products'));
    }

    public function createProduct(): View|Application
    {
        return view('backoffice.products.create');
    }

    public function storeProduct(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'brand' => 'required|string|max:255',
        ]);

        ProductsModel::create($request->all());

        return redirect()->route('backoffice.products')->with('success', 'Produit créé avec succès !');
    }

    public function editProduct($id): View|Application
    {
        $product = ProductsModel::findOrFail($id);
        return view('backoffice.products.edit', compact('product'));
    }

    public function updateProduct(Request $request, $id): RedirectResponse
    {
        $product = ProductsModel::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'brand' => 'required|string|max:255',
        ]);

        $product->update($request->all());

        return redirect()->route('backoffice.products')->with('success', 'Produit modifié avec succès !');
    }

    public function deleteProduct($id): RedirectResponse
    {
        $product = ProductsModel::findOrFail($id);
        $product->delete();

        return redirect()->route('backoffice.products')->with('success', 'Produit supprimé avec succès !');
    }
}
