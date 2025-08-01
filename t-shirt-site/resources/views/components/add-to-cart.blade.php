
@props(['product'])

<form action="{{ route('cart.add', $product) }}" method="POST" class="add-to-cart-form">
    @csrf

    <div class="mb-3">
        <label for="quantity" class="form-label fw-semibold">Quantité :</label>
        <div class="input-group" style="max-width: 200px;">
            <button type="button" onclick="decreaseQuantity()" class="btn btn-outline-secondary">
                <i class="fas fa-minus"></i>
            </button>
            <input type="number"
                   id="quantity"
                   name="quantity"
                   value="1"
                   min="1"
                   max="100"
                   class="form-control text-center"
                   aria-label="Quantité">
            <button type="button" onclick="increaseQuantity()" class="btn btn-outline-secondary">
                <i class="fas fa-plus"></i>
            </button>
        </div>
    </div>

    @auth
        <button type="submit" class="btn btn-primary w-100 d-flex align-items-center justify-content-center">
            <i class="fas fa-shopping-cart me-2"></i>Ajouter au panier
        </button>
    @else
        <a href="{{ route('login') }}" class="btn btn-secondary w-100">
            Connectez-vous pour acheter
        </a>
    @endauth
</form>

<script>
    function decreaseQuantity() {
        const input = document.getElementById('quantity');
        let value = parseInt(input.value);
        if (value > 1) input.value = value - 1;
    }

    function increaseQuantity() {
        const input = document.getElementById('quantity');
        let value = parseInt(input.value);
        if (value < 100) input.value = value + 1;
    }
</script>
