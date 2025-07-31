<h1>Liste des produits (Raw SQL Query)</h1>

<ul>
@foreach($products as $product)
    <li>{{ $product->name }} - {{ $product->price }} €</li>
@endforeach
</ul>
