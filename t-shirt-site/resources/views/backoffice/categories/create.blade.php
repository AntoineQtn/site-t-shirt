@extends('layouts.backoffice')

@section('title', 'Créer une catégorie')

@section('content')
    <h1 class="mb-4">Créer une nouvelle catégorie</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('backoffice.categories.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nom de la catégorie</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Créer</button>
        <a href="{{ route('backoffice.categories.index') }}" class="btn btn-secondary">Retour</a>
    </form>
@endsection
