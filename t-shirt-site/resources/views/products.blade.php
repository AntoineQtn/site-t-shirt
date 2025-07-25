
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




