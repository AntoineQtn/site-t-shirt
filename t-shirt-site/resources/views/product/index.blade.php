@extends('layouts.frontoffice')
@include('components.header')

    <h1>Nos produits</h1>

    <ul>
        @foreach($products as $product)
            <li>
                <strong>{{ $product->name }}</strong><br>
                {{ $product->description }}<br>
                Prix : {{ $product->price }} €<br>
                Quantité : {{ $product->quantity }}<br>
                <a href="{{ route('products.show', ['id' => $product->id]) }}" class="btn-panier"> Ajouter au panier</a>
                <hr>
            </li>
        @endforeach
    </ul>






