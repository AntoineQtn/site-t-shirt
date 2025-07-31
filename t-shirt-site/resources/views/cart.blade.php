@include('components.header')
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Votre Panier</title>
    <style>
        table { width: 70%; margin: 20px auto; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: center; }
        th { background-color: #f5f5f5; }
        .btn-retour {
            display: block;
            margin: 20px auto;
            background-color: #007BFF;
            color: white;
            padding: 10px 15px;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
            width: 220px;
        }
        p.success-message {
            text-align: center;
            color: green;
            font-weight: bold;
            margin-top: 20px;
        }
        p.empty-cart {
            text-align: center;
            font-style: italic;
            margin-top: 40px;
            color: #555;
        }
        button {
            cursor: pointer;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 3px;
            padding: 5px 12px;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
        form.inline-form {
            display: inline;
        }
        form.clear-cart {
            text-align: center;
            margin-top: 20px;
        }
        form.clear-cart button {
            background-color: red;
            width: 220px;
        }
    </style>
</head>
<body>
    <h1 style="text-align:center;">🛒 Contenu du panier</h1>

    @if(session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    @php
        $cart = isset($cart) && is_array($cart) ? $cart : [];
    @endphp

    @if(count($cart) > 0)
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prix unitaire</th>
                    <th>Quantité</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @php $totalGeneral = 0; @endphp
                @foreach($cart as $id => $item)
                    @php
                        $prix = floatval($item['prix']);
                        $quantite = intval($item['quantite']);
                        $totalLigne = $prix * $quantite;
                        $totalGeneral += $totalLigne;
                    @endphp
                    <tr>
                        <td>{{ $item['nom'] }}</td>
                        <td>{{ number_format($prix, 2, ',', ' ') }} €</td>
                        <td>{{ $quantite }}</td>
                        <td>{{ number_format($totalLigne, 2, ',', ' ') }} €</td>
                        <td>
                            <form action="{{ route('cart.decrease', $id) }}" method="POST" class="inline-form">
                                @csrf
                                <button type="submit">−</button>
                            </form>
                            <form action="{{ route('cart.increase', $id) }}" method="POST" class="inline-form">
                                @csrf
                                <button type="submit">+</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3"><strong>Total général</strong></td>
                    <td colspan="2"><strong>{{ number_format($totalGeneral, 2, ',', ' ') }} €</strong></td>
                </tr>
            </tfoot>
        </table>

        <form action="{{ route('cart.clear') }}" method="POST" class="clear-cart">
            @csrf
            <button type="submit">Vider le panier</button>
        </form>

    @else
        <p class="empty-cart">Votre panier est vide.</p>
    @endif

    <a href="{{ url('/products') }}" class="btn-retour">← Continuer vos achats</a>
</body>
@include('components.footer')
</html>
