


@include('components.header')
<!DOCTYPE html>
<html>
<head>
    <title>{{ $product->name }}</title>
    <style>
        img {
            width: 10%;
            height: auto;
        }
        h1 {
            color: green;
        }
        button {
            background-color: red;
            color: white;
        }
        body {
            font-family: Arial, sans-serif;
            justify-content: center;
            padding: 1px;
            margin-left: 500px;
        }
        .top-container {
            display: flex;
            align-items: flex-start;
            gap: 50px;
        }
        table {
            margin: 40px auto 0 auto;
            border-collapse: collapse;
            width: 150px;
            text-align: center;
            font-size: 1em;
        }
        .gallery {
            display: grid;
            grid-template-columns: repeat(2, 300px);
            grid-auto-rows: auto;
            gap: 20px;
        }
        .gallery img {
            width: 300px;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
        }
        table, th, td {
            border: 1px solid #ccc;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .old-price {
            text-decoration: line-through;
            color: gray;
            margin-right: 10px;
        }
        .promo-price {
            color: red;
            font-weight: bold;
            font-size: 1.2em;
        }
        .promo {
            background-color: #ffe0e0;
            padding: 5px 10px;
            display: inline-block;
            margin-top: 10px;
            border-radius: 5px;
            font-weight: bold;
            color: #c40000;
        }
        .btn-panier {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
        }
    </style>
</head>
<nav>
        <a href="/homepage">homepage</a>

        <a href="">Profil</a>
        <a href="/cart">Panier</a>
        <a href="/products">Catalogue</a>
        <a href="{{ route('login.form') }}">Connexion Backoffice</a> <!-- lien vers login -->
    </nav>
<body>

    <h1>Produit : {{ $product->name }}</h1>

    <div class="top-container">
        <div class="gallery">
            <img src="https://assets.laboutiqueofficielle.com/w_1100,q_auto,f_auto/media/products/2023/11/03/teddy-yacht-club_395936_TYC_TSO_ATELIERPARIS_BLCNOI_20231110T100438_01.jpg" alt="T-Shirt 1">
            <img src="https://assets.laboutiqueofficielle.com/w_1100,q_auto,f_auto/media/products/2023/11/03/teddy-yacht-club_395936_TYC_TSO_ATELIERPARIS_BLCNOI_20231110T100439_02.jpg" alt="T-Shirt 2">
            <img src="https://assets.laboutiqueofficielle.com/w_1100,q_auto,f_auto/media/products/2023/11/03/teddy-yacht-club_395936_TYC_TSO_ATELIERPARIS_BLCNOI_20231110T100440_03.jpg" alt="T-Shirt 3">
        </div>

        <table>
            <thead>
                <tr>
                    <th>Taille</th>
                    <th>Dispo</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>XS</td><td>✔️</td></tr>
                <tr><td>S</td><td>✔️</td></tr>
                <tr><td>M</td><td>✔️</td></tr>
                <tr><td>L</td><td>✔️</td></tr>
                <tr><td>XL</td><td>✔️</td></tr>
                <tr><td>2XL</td><td>✔️</td></tr>
                <tr><td>3XL</td><td>❌</td></tr>
            </tbody>
        </table>
    </div>

    <p><strong>{{ $product->name }}</strong></p>
    <p>{{ $product->description }}</p>

    <p>
        <span class="promo-price">{{ number_format($product->price, 2, ',', ' ') }} €</span>
        <span class="old-price">24,99 €</span>
    </p>
    <div class="promo">-20% de réduction</div>

    <br><br>

    <!-- BOUTON Ajouter au panier -->
    <form method="POST" action="{{ route('cart') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $product->id }}">
        <input type="hidden" name="nom" value="{{ $product->name }}">
        <input type="hidden" name="prix" value="{{ $product->price }}">

        <button type="submit" style="background-color: red; color: white; border: none; padding: 10px 20px; border-radius: 5px;">
            Ajouter au panier
        </button>
    </form>

    <br>

    <!-- LIEN vers la page du panier -->
    <a href="{{ route('cart') }}" class="btn-panier">🛒 Voir le panier</a>

</body>

@include('components.footer')
</html>
