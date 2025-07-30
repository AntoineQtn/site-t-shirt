<@extends('layouts.admin')

@section('title', 'Liste des produits')

@section('content')
    <a href="{{ route('admin.products.create') }}" class="btn btn-success mb-3">➕ Ajouter un produit</a>

    <table class="table table-bordered table-hover bg-white">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Marque</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Disponible</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->marque }}</td>
                <td>{{ $product->price }} €</td>
                <td>{{ $product->quantite }}</td>
                <td>
                    <span class="badge {{ $product->disponibilite ? 'bg-success' : 'bg-danger' }}">
                        {{ $product->disponibilite ? 'Oui' : 'Non' }}
                    </span>
                </td>
                <td>
                    <a href="{{ url('/admin/products/' . $product->id . '/edit') }}" class="btn btn-sm btn-primary">✏️ Modifier</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
