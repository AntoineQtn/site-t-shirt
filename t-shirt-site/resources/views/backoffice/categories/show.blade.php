@extends('layouts.backoffice')

@section('title', 'Détails de la catégorie')

@section('content')
    <h1 class="mb-4">Détails de la catégorie</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $category->name }}</h5>
            <p class="card-text"><strong>ID :</strong> {{ $category->id }}</p>
            <p class="card-text"><strong>Créée le :</strong> {{ $category->created_at->format('d/m/Y') }}</p>
            <p class="card-text"><strong>Dernière mise à jour :</strong> {{ $category->updated_at->format('d/m/Y') }}</p>

            <a href="{{ route('backoffice.categories.edit', $category->id) }}" class="btn btn-warning">Modifier</a>
            <a href="{{ route('backoffice.categories.index') }}" class="btn btn-secondary">Retour à la liste</a>
        </div>
    </div>
@endsection
