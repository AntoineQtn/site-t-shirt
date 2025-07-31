@extends('layouts.admin')

@section('title', 'Ajouter un produit')

@section('content')

    {{-- Bloc d'affichage des erreurs de validation --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Erreurs lors de la soumission :</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li> {{-- Affiche les erreurs PHP (validation Laravel) --}}
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.products.store') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" name="name" id="name" class="form-control" required 
                value="{{ old('name', isset($product) ? $product->name : '') }}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description', isset($product) ? $product->description : '') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image (nom du fichier)</label>
            <input type="text" name="image" id="image" class="form-control" 
                value="{{ old('image', isset($product) ? $product->image : '') }}">
        </div>

        <div class="mb-3">
            <label for="marque" class="form-label">Marque</label>
            <input type="text" name="marque" id="marque" class="form-control" 
                value="{{ old('marque', isset($product) ? $product->marque : '') }}">
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="disponibilite" value="1" class="form-check-input" id="dispoCheck"
                {{ old('disponibilite', isset($product) ? $product->disponibilite : false) ? 'checked' : '' }}>
            <label class="form-check-label" for="dispoCheck">Disponible</label>
        </div>

        <div class="mb-3">
            <label for="quantite" class="form-label">Quantité</label>
            <input type="number" name="quantite" id="quantite" class="form-control" required
                value="{{ old('quantite', isset($product) ? $product->quantite : '') }}">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Prix (€)</label>
            <input type="text" name="price" id="price" class="form-control" required
                value="{{ old('price', isset($product) ? $product->price : '') }}">
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Catégorie</label>
            <select name="category_id" id="category_id" class="form-select">
                <option value="">-- Choisir une catégorie --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" 
                        {{ old('category_id', isset($product) ? $product->category_id : '') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Enregistrer</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Retour</a>
    </form>
@endsection
