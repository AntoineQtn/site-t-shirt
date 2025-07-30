@extends('layouts.backoffice')

@section('title', 'Détail de la commande')

@section('content')
    <h1 class="mb-4">Commande #{{ $order->id }}</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Client : {{ $order->customer_name }}</h5>
            <p class="card-text"><strong>Total :</strong> {{ number_format($order->total_price, 2, ',', ' ') }} €</p>
            <p class="card-text"><strong>Statut :</strong> {{ $order->status }}</p>
            <p class="card-text"><strong>Adresse :</strong> {{ $order->address }}</p>
            <p class="card-text"><strong>Date :</strong> {{ $order->created_at->format('d/m/Y à H:i') }}</p>

            <a href="{{ route('backoffice.orders.edit', $order->id) }}" class="btn btn-warning">Modifier</a>
            <a href="{{ route('backoffice.orders.index') }}" class="btn btn-secondary">Retour à la liste</a>
        </div>
    </div>
    <br></br>

 <a href="{{ route('backoffice') }}"> Retour au tableau de bord</a>

@endsection
