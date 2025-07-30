 <@extends('layouts.backoffice')
@section('title', 'Tableau de bord')

@section('content')
    <h1 class="mb-4">Tableau de bord</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="card text-bg-light mb-3">
                <div class="card-header">Détail du Produit</div>
                <div class="card-body">
                    <p class="card-text">Gérer les détails du produit</p>
                    <a href="{{ url('/backoffice/products/1') }}" class="btn btn-primary">Voir Détail du produit</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-bg-light mb-3">
                <div class="card-header">ordrs</div>
                <div class="card-body">
                    <p class="card-text">Gérer les commandes clients</p>
                    <a href={{ url('/backoffice/orders') }} class="btn btn-primary">Voir les commandes</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-bg-light mb-3">
                <div class="card-header">categories</div>
                <div class="card-body">
                    <p class="card-text">Gérer les catégories</p>
                    <a href={{ url('/backoffice/categories') }} class="btn btn-primary">Voir les catégories</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-bg-light mb-3">
                <div class="card-header">Utilisateurs</div>
                <div class="card-body">
                    <p class="card-text">Gérer les comptes utilisateurs</p>
                    <a href={{ url('/backoffice/users') }} class="btn btn-primary">Voir les utilisateurs</a>
                </div>
            </div>
        </div>
    


    <div class="col-md-4">
            <div class="card text-bg-light mb-3">
                <div class="card-header">liste des produits </div>
                <div class="card-body">
                    <p class="card-text">Gérer les liste des produits</p>
                    <a href={{ url('/backoffice/products') }} class="btn btn-primary">Voir les liste des produits</a>
                </div>
            </div>
        </div>
    </div>

    <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Déconnexion</button>
  </form>

    <br></br>
  <a href="/homepage" class="btn btn-secondary mt-3">Retour page d'accueil</a>

@endsection                                