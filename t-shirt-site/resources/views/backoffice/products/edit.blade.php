@extends('layouts.backoffice')

@section('title', 'Modifier un produit')

@section('content')
    <h1>Modifier le produit</h1>

    <form action="{{ route('backoffice.products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ $product->nom }}" required>
        </div>
        <div class="mb-3">
            <label for="prix" class="form-label">Prix (€)</label>
            <input type="number" name="prix" id="prix" class="form-control" step="0.01" value="{{ $product->prix }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
@endsection
