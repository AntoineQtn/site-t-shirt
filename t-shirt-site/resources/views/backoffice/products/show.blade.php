@extends('layouts.backoffice')

@section('title', 'Détail produit')

@section('content')
    <h1>Détail du produit</h1>

    <p><strong>Nom :</strong> {{ $product->name }}</p>
    <p><strong>Prix :</strong> {{ number_format($product->price, 2, ',', ' ') }} €</p>

    <p><strong>Description :</strong> {{ $product->description ?? 'Aucune description' }}</p>
    <p><strong>Marque :</strong> {{ $product->brand ?? 'Non spécifiée' }}</p>
    <p><strong>Quantité disponible :</strong> {{ $product->quantity }}</p>
    <p><strong>Disponible :</strong> {{ $product->available ? 'Oui' : 'Non' }}</p>

    <a href="{{ route('backoffice.products.edit', $product->id) }}" class="btn btn-warning">Modifier</a>
    <a href="{{ route('backoffice.products.index') }}" class="btn btn-secondary">Retour</a>
    <br></br>
     <a href="{{ route('backoffice') }}"> Retour au tableau de bord</a>
@endsection
