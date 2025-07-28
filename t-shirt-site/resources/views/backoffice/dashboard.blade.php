 <@extends('layouts.backoffice')

@section('title', 'Accueil')

@section('content')
    <h1 class="mb-4">Tableau de bord</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="card text-bg-light mb-3">
                <div class="card-header">Produits</div>
                <div class="card-body">
                    <p class="card-text">Gérer les produits du site</p>
                    <a href="http://127.0.0.1:8001/products" class="btn btn-primary">Voir les produits</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-bg-light mb-3">
                <div class="card-header">Commandes</div>
                <div class="card-body">
                    <p class="card-text">Gérer les commandes clients</p>
                    <a href="#" class="btn btn-primary">Voir les commandes</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-bg-light mb-3">
                <div class="card-header">Utilisateurs</div>
                <div class="card-body">
                    <p class="card-text">Gérer les comptes utilisateurs</p>
                    <a href="#" class="btn btn-primary">Voir les utilisateurs</a>
                </div>
            </div>
        </div>
    </div>
@endsection                                