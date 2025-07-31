<h1>Modifier le produit</h1>

<form method="POST" action="{{ url('/admin/products/' . $product->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Nom :</label>
        <input type="text" id="name" name="name" class="form-control" required
            value="{{ old('name', $product->name) }}">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description :</label>
        <textarea id="description" name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Image :</label>
        <input type="text" id="image" name="image" class="form-control"
            value="{{ old('image', $product->image) }}">
    </div>

    <div class="mb-3">
        <label for="marque" class="form-label">Marque :</label>
        <input type="text" id="marque" name="marque" class="form-control"
            value="{{ old('marque', $product->marque) }}">
    </div>

    <div class="form-check mb-3">
        <input type="checkbox" id="disponibilite" name="disponibilite" value="1" class="form-check-input"
            {{ old('disponibilite', $product->disponibilite) ? 'checked' : '' }}>
        <label for="disponibilite" class="form-check-label">Disponible</label>
    </div>

    <div class="mb-3">
        <label for="quantite" class="form-label">Quantité :</label>
        <input type="number" id="quantite" name="quantite" class="form-control" required
            value="{{ old('quantite', $product->quantite) }}">
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Prix :</label>
        <input type="text" id="price" name="price" class="form-control" required
            value="{{ old('price', $product->price) }}">
    </div>

    <div class="mb-3">
        <label for="category_id" class="form-label">Catégorie :</label>
        <select name="category_id" id="category_id" class="form-select">
            <option value="">-- Choisir une catégorie --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Mettre à jour</button>
</form>
