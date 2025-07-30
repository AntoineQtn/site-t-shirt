@extends('layouts.backoffice')

@section('title', 'Ajouter un produit')

@section('content')
    <h1>Ajouter un produit</h1>

    <form action="{{ route('backoffice.products.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                      rows="3">{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Prix (€)</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control @error('price') is-invalid @enderror"
                   value="{{ old('price') }}" required>
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="brand" class="form-label">Marque</label>
            <input type="text" name="brand" id="brand" class="form-control @error('brand') is-invalid @enderror"
                   value="{{ old('brand') }}">
            @error('brand')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="available" id="available" class="form-check-input" {{ old('available', true) ? 'checked' : '' }}>
            <label for="available" class="form-check-label">Disponible</label>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantité</label>
            <input type="number" name="quantity" id="quantity" class="form-control @error('quantity') is-invalid @enderror"
                   value="{{ old('quantity', 0) }}" min="0">
            @error('quantity')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Ajouter</button>
        <a href="{{ route('backoffice.products.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
    
        <br></br>


     <a href="{{ route('backoffice') }}"> Retour au tableau de bord</a>
@endsection
