@extends('layouts.frontoffice')
@include('components.header')

    <<div class="container mt-5">
    <h1 class="mb-4 text-center">Nos produits</h1>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($products as $product)
            <div class="col">
                <div class="card h-100 shadow-sm">

                    @if($product->image)
                        <img src="{{ asset('storage/products/' . $product->image) }}"
                             class="card-img-top"
                             alt="{{ $product->name }}"
                             style="object-fit: cover; height: 200px;">
                    @else
                        <div class="d-flex justify-content-center align-items-center bg-light" style="height: 200px;">
                            <span class="text-muted">Aucune image</span>
                        </div>
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text fw-bold">Prix : {{ $product->price }} €</p>
                        <p class="card-text">Quantité : {{ $product->quantity }}</p>
                    </div>

                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('products.show', ['id' => $product->id]) }}" class="btn btn-outline-primary btn-sm">
                            Voir le produit
                        </a>
                        <a href="{{ route('products.show', ['id' => $product->id]) }}" class="btn btn-success btn-sm">
                            Ajouter au panier
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>






