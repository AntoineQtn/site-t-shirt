<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon Panier</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        form {
            display: inline;
        }
    </style>
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

@if($cart->isNotEmpty())
    <table>
        <thead>
            <tr>
                <th>Produit</th>
                <th>Prix unitaire</th>
                <th>Quantité</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cart as $item)
            <tr>
                <td><strong>{{ $item->name }}</strong></td>
                <td>{{ number_format($item->price, 2) }} €</td>
                <td>
                    <form action="{{ route('cart.update', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" style="width: 60px;">
                        <button type="submit">Mettre à jour</button>
                    </form>
                </td>
                <td>{{ number_format($item->price * $item->quantity, 2) }} €</td>
                <td>
                    <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Retirer</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <p><strong>Total général :</strong> {{ number_format($cart->sum(fn($item) => $item->price * $item->quantity), 2) }} €</p>
    <a href="{{ route('checkout') }}">Passer à la caisse</a>
@else
    <p>Votre panier est vide.</p>
@endif

</body>
</html>
