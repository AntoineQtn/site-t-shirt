<!DOCTYPE html>
<html>
<head>
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
    </style>
</head>
<body>
    <h1>Nos produits</h1>

    <ul>
        @foreach($products as $product)
            <li>
                <strong>{{ $product->name }}</strong><br>
                {{ $product->description }}<br>
                Prix : {{ $product->price }} €<br>
                Quantité : {{ $product->quantity }}<br>

                <a href="{{ route('show', $product->id) }}">Voir le détail</a>
                <hr>
            </li>
        @endforeach
    </ul>

</body>
</html>
