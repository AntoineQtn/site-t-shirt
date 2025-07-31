


@include('components.header')
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>{{ $product->name }}</title>
    <style>
        img {
            width: 100%;
            max-width: 300px;
            height: auto;
        }
        h1 {
            color: green;
        }
        button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            max-width: 800px;
            margin: auto;
        }
        nav a {
            margin-right: 10px;
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
        }
        nav a:hover {
            text-decoration: underline;
        }
        .gallery {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }
        .gallery img {
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
        }
        .btn-panier {
            display: inline-block;
            margin-top: 15px;
            background-color: #007BFF;
            color: white;
            padding: 10px 25px;
            border-radius: 5px;
            text-decoration: none;
        }
        .btn-panier:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<nav>
    <a href="{{ url('/homepage') }}">Homepage</a>
    <a href="{{ url('/profile') }}">Profil</a>
    <a href="{{ route('cart') }}">Panier</a>
    <a href="{{ url('/products') }}">Catalogue</a>
    <a href="{{ route('login.form') }}">Connexion Backoffice</a>
</nav>

<h1>Produit : {{ $product->name }}</h1>

<div class="gallery">
    <img src="https://assets.laboutiqueofficielle.com/w_1100,q_auto,f_auto/media/products/2023/11/03/teddy-yacht-club_395936_TYC_TSO_ATELIERPARIS_BLCNOI_20231110T100438_01.jpg" alt="Image 1">
    <img src="https://assets.laboutiqueofficielle.com/w_1100,q_auto,f_auto/media/products/2023/11/03/teddy-yacht-club_395936_TYC_TSO_ATELIERPARIS_BLCNOI_20231110T100439_02.jpg" alt="Image 2">
    <img src="https://assets.laboutiqueofficielle.com/w_1100,q_auto,f_auto/media/products/2023/11/03/teddy-yacht-club_395936_TYC_TSO_ATELIERPARIS_BLCNOI_20231110T100440_03.jpg" alt="Image 3">
</div>

<p><strong>Description :</strong></p>
<p>{{ $product->description }}</p>

<p><strong>Prix :</strong> {{ number_format($product->price, 2, ',', ' ') }} €</p>

<!-- Formulaire d'ajout au panier -->
<form method="POST" action="{{ route('cart.add') }}">
    @csrf
    <input type="hidden" name="id" value="{{ $product->id }}">
    <input type="hidden" name="nom" value="{{ $product->name }}">
    <input type="hidden" name="prix" value="{{ $product->price }}">
    <button type="submit">Ajouter au panier</button>
</form>

<a href="{{ route('cart') }}" class="btn-panier">🛒 Voir le panier</a>

@include('components.footer')
</body>
</html>
