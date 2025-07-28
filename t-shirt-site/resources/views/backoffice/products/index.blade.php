@extends('layouts.backoffice')

@section('title', 'Liste des produits')

@section('content')
    <h1>Liste des produits</h1>
    <a href="{{ route('backoffice.products.create') }}" class="btn btn-success mb-3">+ Ajouter un produit</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $produit)
                <tr>
                    <td>{{ $produit->id }}</td>
                    <td>{{ $produit->nom }}</td>
                    <td>{{ number_format($produit->prix, 2, ',', ' ') }} €</td>
                    
                    <td>

                        <a href="{{ route('backoffice.products.show', $produit->id) }}" class="btn btn-info btn-sm">Voir</a>
                        <a href="{{ route('backoffice.products.edit', $produit->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('backoffice.products.destroy', $produit->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce produit ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
