@include('components.header')
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Votre Panier</title>
    <style>
        table { width: 60%; margin: 20px auto; border-collapse: collapse; }
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
            width: 200px;
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
    </style>
</head>
<body>
    <h1 style="text-align:center;">🛒 Contenu du panier</h1>

    @if(session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    @php
        // Sécurisation : si $cart n'existe pas ou n'est pas un tableau, on crée un tableau vide
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
                </tr>
            </thead>
            <tbody>
                @php $totalGeneral = 0; @endphp
                @foreach($cart as $id => $item)
                    @php
                        // On force la conversion en float/int pour éviter les erreurs
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
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3"><strong>Total général</strong></td>
                    <td><strong>{{ number_format($totalGeneral, 2, ',', ' ') }} €</strong></td>
                </tr>
            </tfoot>
        </table>
    @else
        <p class="empty-cart">Votre panier est vide.</p>
    @endif

    <a href="/products" class="btn-retour">← Continuer vos achats</a>
</body>
@include('components.footer')
</html>
