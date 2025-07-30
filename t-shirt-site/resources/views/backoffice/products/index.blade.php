@extends('layouts.backoffice')

@section('title', 'Liste des produits')

@section('content')
    <h1>Liste des produits</h1>

    <a href="{{ route('backoffice.products.create') }}" class="btn btn-primary mb-3">Ajouter un produit</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prix (€)</th>
                <th>Quantité</th>
                <th>Disponible</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ number_format($product->price, 2, ',', ' ') }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->available ? 'Oui' : 'Non' }}</td>
                    <td>
                        <a href="{{ route('backoffice.products.show', $product->id) }}" class="btn btn-info btn-sm">Voir</a>
                        <a href="{{ route('backoffice.products.edit', $product->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('backoffice.products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce produit ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
        <br></br>

 <a href="{{ route('backoffice') }}"> Retour au tableau de bord</a>
@endsection
