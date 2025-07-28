<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon Panier</title>
</head>
<body>

<h1>Votre panier</h1>

@if(session('success'))
    <div style="background-color: #d4edda; padding: 10px; margin-bottom: 15px;">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div style="background-color: #f8d7da; padding: 10px; margin-bottom: 15px;">
        {{ session('error') }}
    </div>
@endif

<ul>
    @forelse($cart as $item)
    <li>
        <strong>{{ $item->name }}</strong><br>
        Prix unitaire : {{ $item->price }} €<br>
        Quantité : {{ $item->quantity }}<br>
        Total : {{ $item->price * $item->quantity }} €<br>

        <!-- m-j-->
        <form action="{{ route('cart.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1">
            <button type="submit">Mettre à jour</button>
        </form>

        <!-- delate -->
        <form action="{{ route('cart.remove', $item->id) }}" method="POST" style="margin-top: 5px;">
            @csrf
            @method('DELETE')
            <button type="submit">Retirer</button>
        </form>
        <hr>
    </li>
    @empty
        <p>Votre panier est vide.</p>
    @endforelse
</ul>

@if($cart->isNotEmpty())
    <p><strong>Total général :</strong> {{ $cart->sum(fn($item) => $item->price * $item->quantity) }} €</p>
    <a href="{{ route('checkout') }}">Passer à la caisse</a>
@endif

</body>
</html>
