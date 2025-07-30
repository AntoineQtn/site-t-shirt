@extends('layouts.backoffice')

@section('title', 'Liste des commandes')

@section('content')
    <h1 class="mb-4">Commandes</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('backoffice.orders.create') }}" class="btn btn-primary mb-3">Créer une commande</a>

    @if($orders->isEmpty())
        <p>Aucune commande enregistrée.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Client</th>
                    <th>Total (€)</th>
                    <th>Statut</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->customer_name }}</td>
                        <td>{{ number_format($order->total_price, 2, ',', ' ') }}</td>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('backoffice.orders.show', $order->id) }}" class="btn btn-sm btn-info">Voir</a>
                            <a href="{{ route('backoffice.orders.edit', $order->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                            <form action="{{ route('backoffice.orders.destroy', $order->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Confirmer la suppression ?')">
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

    <br></br>

 <a href="{{ route('backoffice') }}"> Retour au tableau de bord</a>

@endsection
