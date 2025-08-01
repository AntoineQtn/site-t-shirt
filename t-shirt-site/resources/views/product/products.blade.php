@include('components.header')
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Liste des produits</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        li {
            margin-bottom: 20px;
        }
        hr {
            border: 1px solid #ccc;
        }
        .logout-button {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>
        @auth
            Bienvenue {{ Auth::user()->name }} 👋
        @else
            Bienvenue visiteur 👋
        @endauth
    </h1>

    <p>Voici le contenu de notre catalogue !</p>

    <ul>
        @foreach($products as $product)
            <li>
                <strong>{{ $product->name }}</strong><br>
                {{ $product->description }}<br>
                Prix : {{ number_format($product->price, 2, ',', ' ') }} €<br>
                Quantité : {{ $product->quantity }}<br>

                <a href="{{ route('show', $product->id) }}">Voir le détail</a>
                <hr>
            </li>
        @endforeach
    </ul>

    @auth
        <form method="POST" action="{{ route('logout') }}" class="logout-button">
            @csrf
            <button type="submit">Déconnexion</button>
        </form>
    @endauth
</body>
</html>
