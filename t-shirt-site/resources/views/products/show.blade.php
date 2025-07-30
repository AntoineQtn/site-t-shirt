<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail du produit</title>
    <style>
        table {
            width: 50%;
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

<h1>Détail du produit</h1>

<table>
    <tr>
        <th>Nom</th>
        <td>{{ $product->name }}</td>
    </tr>
    <tr>
        <th>Prix</th>
        <td>{{ number_format($product->price, 2) }} €</td>
    </tr>
</table>

</body>
</html>
