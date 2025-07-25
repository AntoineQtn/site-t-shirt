<ul>
    @foreach($cart as $item)
    <li>
        <strong>{{ $item->name }}</strong><br>
        Prix unitaire : {{ $item->price }} €<br>
        Quantité : {{ $item->quantity }}<br>
        Total : {{ $item->price * $item->quantity }} €<br>

        <!-- pour mettre à jour mon panier -->
        <form action="{{ route('cart.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1">
            <button type="submit">Mettre à jour</button>
        </form>

        <!-- pour la suppression-->
        <form action="{{ route('cart.remove', $item->id) }}" method="POST" style="margin-top: 5px;">
            @csrf
            @method('DELETE')
            <button type="submit">Retirer</button>
        </form>

        <hr>
    </li>
    @endforeach
</ul>

<p><strong>Total général :</strong> {{ $cart->sum(fn($item) => $item->price * $item->quantity) }} €</p>
<a href="{{ route('checkout') }}">Passer à la caisse</a>

<p>there is nothing in your basket</p>


</body>

</html>
?>