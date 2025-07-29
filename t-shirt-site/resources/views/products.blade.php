<?php
public function show($id)
{
    // Exemple fictif
    $product = Product::find($id);
    return view('products.show', compact('product'));
}
<!DOCTYPE html>
<html>
<head>
    <title>Liste des produits</title>
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
                <hr>
            </li>
        @endforeach
    </ul>

</body>
</html>
