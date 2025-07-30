@extends('layouts.admin')

@section('title', 'Ajouter un produit')

@section('content')
    <form method="POST" action="{{ route('admin.products.store') }}">
        @csrf

        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Image (nom du fichier)</label>
            <input type="text" name="image" class="form-control">
        </div>

        <div class="mb-3">
            <label>Marque</label>
            <input type="text" name="marque" class="form-control">
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="disponibilite" value="1" class="form-check-input" id="dispoCheck">
            <label class="form-check-label" for="dispoCheck">Disponible</label>
        </div>

        <div class="mb-3">
            <label>Quantité</label>
            <input type="number" name="quantite" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Prix (€)</label>
            <input type="text" name="price" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">💾 Enregistrer</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Retour</a>
    </form>
@endsection
<form method="POST" action="{{ route('admin.products.store') }}">
    @csrf
    ...
</form>
