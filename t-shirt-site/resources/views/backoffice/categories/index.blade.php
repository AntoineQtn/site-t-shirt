@extends('layouts.backoffice')

@section('title', 'Liste des catégories')

@section('content')
    <h1 class="mb-4">Catégories</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('backoffice.categories.create') }}" class="btn btn-primary mb-3">Créer une catégorie</a>

    @if($categories->isEmpty())
        <p>Aucune catégorie enregistrée.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('backoffice.categories.edit', $category->id) }}" class="btn btn-sm btn-warning">Modifier</a>

                        <form action="{{ route('backoffice.categories.destroy', $category->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmer la suppression ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
