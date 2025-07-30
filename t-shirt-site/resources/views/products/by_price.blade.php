<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Produits triés par prix</title>
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
    </style>
</head>
<body>

<h1>Liste des produits (triés par prix croissant)</h1>

<table>
    <thead>
        <tr>
            <th>Nom du produit</th>
            <th>Prix</th>
        </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ number_format($product->price, 2) }} €</td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
