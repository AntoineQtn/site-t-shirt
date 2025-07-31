@extends('layouts.admin')

@section('title', 'Catégories et Produits')

@section('content')
    <h1>Catégories</h1>

    @foreach ($categories as $category)
        <h3>{{ $category->name }}</h3>
        <ul>
            @forelse ($category->products as $product)
                <li>{{ $product->name }} - {{ $product->price }} €</li>
            @empty
                <li>Aucun produit</li>
            @endforelse
        </ul>
    @endforeach
@endsection
