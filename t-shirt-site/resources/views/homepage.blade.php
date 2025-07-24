<div>
    <!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->
</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>homepage</title>
</head>
<body>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #222;
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 24px;
        }

        nav {
            display: flex;
            gap: 20px;
        }

        .search-bar {
            margin: 20px;
            text-align: center;
        }

        .search-bar input {
            width: 60%;
            padding: 10px;
            font-size: 16px;
        }

        .promo-banner {
            background-color: #ffdddd;
            padding: 20px;
            text-align: center;
            font-size: 20px;
        }

        .highlight {
            color: red;
            font-weight: bold;
        }

        .section {
            padding: 20px;
        }

        .suggestions, .categories {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .card {
            border: 1px solid #ccc;
            padding: 10px;
            width: 200px;
            text-align: center;
        }

        .discount {
            color: green;
            font-weight: bold;
        }
    </style>

<header>
    <div class="logo">Boutique T-Shirt.com</div>
    <nav>
        <a href="#">Profil</a>
        <a href="#">Panier</a>
        <a href="{{asset (')}}>"catalogue</a>
    </nav>
</header>

<div class="search-bar">
    <input type="text" placeholder="Rechercher un t-shirt...">
</div>

<div class="promo-banner">
    Satisfait ou remboursé – 14 jours pour changer d'avis<br>
    <div class="highlight">Soldes d’été – 2ème démarque ! Jusqu’à <b>80%</b> sur les Nikes bleues</div>
</div>

<section class="section">
    <h2>Suggestions</h2>
    <div class="suggestions">
        <div class="card">Suggestion 1<br><span class="discount">-20%</span></div>
        <div class="card">Suggestion 2<br><span class="discount">-35%</span></div>
        <div class="card">Suggestion 3<br><span class="discount">-50%</span></div>
    </div>
</section>

<section class="section">
    <h2>Top Catégories</h2>
    <div class="categories">
        <div class="card">
            T-shirt homme<br><span class="discount">-20%</span><br>
        </div>
        <div class="card">
            T-shirt femme<br><span class="discount">-20%</span><br>
        </div>
    </div>
</section>

</body>
</html>