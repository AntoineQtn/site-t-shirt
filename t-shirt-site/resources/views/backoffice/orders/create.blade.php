@extends('layouts.backoffice')

@section('title', 'Créer une commande')

@section('content')
    <h1 class="mb-4">Créer une commande</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Erreurs :</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('backoffice.orders.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="customer_name" class="form-label">Nom du client</label>
            <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ old('customer_name') }}" required>
        </div>

        <div class="mb-3">
            <label for="total_price" class="form-label">Total (€)</label>
            <input type="number" step="0.01" class="form-control" id="total_price" name="total_price" value="{{ old('total_price') }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Statut</label>
            <select class="form-select" id="status" name="status">
                <option value="en attente" {{ old('status') == 'en attente' ? 'selected' : '' }}>En attente</option>
                <option value="livré" {{ old('status') == 'livré' ? 'selected' : '' }}>Livré</option>
                <option value="annulé" {{ old('status') == 'annulé' ? 'selected' : '' }}>Annulé</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Adresse</label>
            <textarea class="form-control" id="address" name="address" rows="2">{{ old('address') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Enregistrer</button>
        <a href="{{ route('backoffice.orders.index') }}" class="btn btn-secondary">Annuler</a>
    </form>

   <br></br>

 <a href="{{ route('backoffice') }}"> Retour au tableau de bord</a>


@endsection
