@extends('layouts.backoffice')

@section('title', 'Ajouter un produit')

@section('content')
    <h1>Ajouter un produit</h1>

    <form action="{{ route('backoffice.products.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="prix" class="form-label">Prix (€)</label>
            <input type="number" name="prix" id="prix" class="form-control" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
@endsection
