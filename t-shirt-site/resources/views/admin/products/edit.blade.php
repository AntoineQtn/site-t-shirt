<h1>Modifier le produit</h1>

<form method="POST" action="{{ url('/admin/products/' . $product->id) }}">
    @csrf
    @method('PUT')

    <label>Nom :</label>
    <input type="text" name="name" value="{{ $product->name }}" required><br>

    <label>Description :</label>
    <textarea name="description">{{ $product->description }}</textarea><br>

    <label>Image :</label>
    <input type="text" name="image" value="{{ $product->image }}"><br>

    <label>Marque :</label>
    <input type="text" name="marque" value="{{ $product->marque }}"><br>

    <label>Disponible :</label>
    <input type="checkbox" name="disponibilite" value="1" {{ $product->disponibilite ? 'checked' : '' }}><br>

    <label>Quantité :</label>
    <input type="number" name="quantite" value="{{ $product->quantite }}" required><br>

    <label>Prix :</label>
    <input type="text" name="price" value="{{ $product->price }}" required><br>

    <button type="submit">Mettre à jour</button>
</form>
