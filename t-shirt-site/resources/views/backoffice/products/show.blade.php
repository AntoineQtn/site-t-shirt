@extends('layouts.backoffice')

@section('title', 'Détail produit')

@section('content')
    <h1>Détail du produit</h1>

    <p><strong>Nom :</strong> {{ $product->nom }}</p>
    <p><strong>Prix :</strong> {{ number_format($product->prix, 2, ',', ' ') }} €</p>

    <a href="{{ route('backoffice.products.edit', $product->id) }}" class="btn btn-warning">Modifier</a>
    <a href="{{ route('backoffice.products.index') }}" class="btn btn-secondary">Retour</a>
@endsection
