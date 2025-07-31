@extends('layouts.frontoffice')

@include('components.header')


    <div class="container mt-5">

        <h1 class="mb-4 text-center">Produit : T-Shirt blanc</h1>

        <div class="row">

            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}"
                     class="card-img-top"
                     alt="{{ $product->name }}"
                     style="object-fit: cover; height: 200px;">
            @else
                <div class="d-flex justify-content-center align-items-center bg-light" style="height: 200px;">
                    <span class="text-muted">Aucune image</span>
                </div>
            @endif
            </div>
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Teddy Yacht Club</h5>
                        <p class="card-text">Tee Shirt Oversize Large Atelier Paris Blanc Noir</p>
                        <p>
                            <span class="text-danger fw-bold fs-4">19,99 €</span>
                            <span class="text-muted text-decoration-line-through ms-2">24,99 €</span>
                        </p>
                        <div class="alert alert-success w-50 text-center" role="alert">
                            -20% de réduction
                        </div>
                        <h6 class="mt-4">Tailles disponibles :</h6>
                        <table class="table table-bordered mt-2 w-75">
                            <thead class="table-light">
                            <tr>
                                <th>Taille</th>
                                <th>Dispo</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr><td>XS</td><td>✔️</td></tr>
                            <tr><td>S</td><td>✔️</td></tr>
                            <tr><td>M</td><td>✔️</td></tr>
                            <tr><td>L</td><td>✔️</td></tr>
                            <tr><td>XL</td><td>✔️</td></tr>
                            <tr><td>2XL</td><td>✔️</td></tr>
                            <tr><td>3XL</td><td>❌</td></tr>
                            </tbody>
                        </table>
                        <a href="#" class="btn btn-success mt-3">
                            <i class="fas fa-shopping-cart me-1"><x-add-to-cart :product="$product" /></i> Ajouter au panier
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>


@include('components.footer')
