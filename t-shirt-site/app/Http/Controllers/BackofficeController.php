<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
//Classe Laravel de traitement des retours des méthodes POST/PUT/DELETE
use Illuminate\Http\RedirectResponse;
//Classe Laravel représentant la requête HTTP entrante
use Illuminate\Http\Request;

class BackofficeController extends Controller
{
    //Méthode pour l'affichage du dashboard
    public function dashboard()
    {
        //Utilisation des méthodes Model "count" pour l'affichage de tous les produits puis de "where" et "count"
        //pour afficher seulement les produits disponibles
        $totalProducts = Product::count();
        $availableProducts = Product::where('available', true)->count();

        return view('backoffice.dashboard', compact('totalProducts', 'availableProducts'));
    }

    //Récupération de touts les produits depuis la base
    public function products(): View
    {
        $products = Product::all();
        return view('backoffice.products.index', compact('products'));
    }

    //appel de la méthode create
    public function createProduct(): View|Application
    {
        return view('backoffice.products.create');
    }

    //Appel de la méthode store qui enregistre dans la bd le nouveau produit en prenant en paramètre la requête
    public function storeProduct(Request $request): RedirectResponse
    {
        //vérification que tous les champs obligatoires sont valides
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'brand' => 'required|string|max:255',
        ]);

        $data = $request->only(['name', 'description', 'price', 'quantity', 'brand']);


        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('backoffice.products')->with('success', 'Produit créé avec succès !');
    }


    //méthode pour l'affichage de la View edit utilisant la fonction "findorfail" de notre ProductModel
    public function editProduct($id): View|Application
    {
        $product = Product::findOrFail($id);
        return view('backoffice.products.edit', compact('product'));
    }

    //méthode "Update" qui prend en paramètre la requête et l'id du produit, déroulement semblable à celui de store
    public function updateProduct(Request $request, $id): RedirectResponse
    {

        $product = Product::findOrFail($id);


        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'brand' => 'required|string|max:255',
        ]);

        $data = $request->only(['name', 'description', 'price', 'quantity', 'brand']);

        if ($request->hasFile('image')) {

            if ($product->image && file_exists(storage_path('app/public/' . $product->image))) {
                unlink(storage_path('app/public/' . $product->image));
            }

            $data['image'] = $request->file('image')->store('products', 'public');
        }


        $product->update($data);

        return redirect()->route('backoffice.products')->with('success', 'Produit modifié avec succès !');
    }


    public function deleteProduct($id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        if ($product->image && file_exists(storage_path('app/public/' . $product->image))) {
            unlink(storage_path('app/public/' . $product->image));
        }
        $product->delete();

        return redirect()->route('backoffice.products')->with('success', 'Produit supprimé avec succès !');
    }
}
