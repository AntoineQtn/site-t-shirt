@extends('layouts.frontoffice')

@section('title', 'Mon Panier')


    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h2 text-dark">
                <i class="fas fa-shopping-cart me-2"></i>Mon Panier
            </h1>
            @if($cartItems->count() > 0)
                <form action="{{ route('cart.clear') }}" method="POST"
                      onsubmit="return confirm('Êtes-vous sûr de vouloir vider votre panier ?')"
                      class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash me-1"></i>Vider le panier
                    </button>
                </form>
            @endif
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($cartItems->count() == 0)
            <div class="text-center py-5">
                <div class="mb-4">
                    <i class="fas fa-shopping-cart text-muted" style="font-size: 4rem;"></i>
                </div>
                <h3 class="text-muted mb-3">Votre panier est vide</h3>
                <p class="text-muted mb-4">Découvrez nos produits et ajoutez-les à votre panier</p>
                <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-shopping-bag me-2"></i>Continuer mes achats
                </a>
            </div>
        @else
            <div class="row">
                <!-- Articles du panier -->
                <div class="col-lg-8 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-header bg-light">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-list me-2"></i>Articles ({{ $cartItems->sum('quantity') }})
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            @foreach($cartItems as $item)
                                <div class="border-bottom p-4 cart-item" data-item-id="{{ $item->id }}">
                                    <div class="row align-items-center">
                                        <!-- Image du produit -->
                                        <div class="col-md-2 col-3 mb-3 mb-md-0">
                                            <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                                 style="height: 80px;">
                                                @if($item->product->image)
                                                    <img src="{{ asset('storage/' . $item->product->image) }}"
                                                         alt="{{ $item->product->name }}"
                                                         class="img-fluid rounded" style="max-height: 80px;">
                                                @else
                                                    <i class="fas fa-box text-muted fa-2x"></i>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Informations produit -->
                                        <div class="col-md-4 col-9 mb-3 mb-md-0">
                                            <h6 class="fw-bold mb-1">{{ $item->product->name }}</h6>
                                            <p class="text-muted mb-0 small">{{ number_format($item->price, 2) }} € l'unité</p>
                                        </div>

                                        <!-- Contrôles quantité -->
                                        <div class="col-md-3 col-6 mb-3 mb-md-0">
                                            <label class="form-label small text-muted">Quantité</label>
                                            <div class="input-group input-group-sm">
                                                <button class="btn btn-outline-secondary" type="button"
                                                        onclick="updateQuantity({{ $item->id }}, {{ $item->quantity - 1 }})"
                                                    {{ $item->quantity <= 1 ? 'disabled' : '' }}>
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <input type="text" class="form-control text-center quantity-display"
                                                       value="{{ $item->quantity }}" readonly>
                                                <button class="btn btn-outline-secondary" type="button"
                                                        onclick="updateQuantity({{ $item->id }}, {{ $item->quantity + 1 }})">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- Total ligne et actions -->
                                        <div class="col-md-2 col-4 text-end">
                                            <div class="fw-bold text-success item-total mb-2">
                                                {{ number_format($item->total, 2) }} €
                                            </div>
                                            <button onclick="removeItem({{ $item->id }})"
                                                    class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>

                                        <!-- Bouton supprimer mobile -->
                                        <div class="col-2 d-md-none text-end">
                                            <button onclick="removeItem({{ $item->id }})"
                                                    class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Résumé de commande -->
                <div class="col-lg-4">
                    <div class="card shadow-sm sticky-top" style="top: 20px;">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-calculator me-2"></i>Résumé de commande
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-2">
                                <span>Sous-total</span>
                                <span class="cart-subtotal">{{ number_format($total, 2) }} €</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Livraison</span>
                                <span class="text-success">
                                <i class="fas fa-truck me-1"></i>Gratuite
                            </span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mb-4">
                                <strong>Total</strong>
                                <strong class="text-success fs-5 cart-total">{{ number_format($total, 2) }} €</strong>
                            </div>

                            <button class="btn btn-success btn-lg w-100 mb-3">
                                <i class="fas fa-credit-card me-2"></i>Passer commande
                            </button>

                            <a href="{{ route('products.index') }}"
                               class="btn btn-outline-primary w-100">
                                <i class="fas fa-arrow-left me-2"></i>Continuer mes achats
                            </a>
                        </div>

                        <!-- Informations complémentaires -->
                        <div class="card-footer bg-light">
                            <small class="text-muted">
                                <div class="d-flex align-items-center mb-1">
                                    <i class="fas fa-shield-alt text-success me-2"></i>Paiement sécurisé
                                </div>
                                <div class="d-flex align-items-center mb-1">
                                    <i class="fas fa-undo text-info me-2"></i>Retours sous 30 jours
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-headset text-warning me-2"></i>Support client 7j/7
                                </div>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <script>
        function updateQuantity(itemId, newQuantity) {
            if (newQuantity < 1) return;

            fetch(`/cart/update/${itemId}`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ quantity: newQuantity })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Mettre à jour l'affichage
                        const item = document.querySelector(`[data-item-id="${itemId}"]`);
                        item.querySelector('.quantity-display').value = newQuantity;
                        item.querySelector('.item-total').textContent = data.total.toFixed(2) + ' €';

                        // Mettre à jour les totaux
                        document.querySelector('.cart-subtotal').textContent = data.cartTotal.toFixed(2) + ' €';
                        document.querySelector('.cart-total').textContent = data.cartTotal.toFixed(2) + ' €';

                        // Animation de succès
                        item.classList.add('bg-light');
                        setTimeout(() => item.classList.remove('bg-light'), 1000);
                    }
                })
                .catch(error => {
                    console.error('Erreur:', error);
                    alert('Une erreur est survenue lors de la mise à jour.');
                });
        }

        function removeItem(itemId) {
            if (!confirm('Êtes-vous sûr de vouloir supprimer cet article ?')) return;

            fetch(`/cart/remove/${itemId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Animation de suppression
                        const item = document.querySelector(`[data-item-id="${itemId}"]`);
                        item.style.transition = 'opacity 0.3s';
                        item.style.opacity = '0';
                        setTimeout(() => location.reload(), 300);
                    }
                })
                .catch(error => {
                    console.error('Erreur:', error);
                    alert('Une erreur est survenue lors de la suppression.');
                });
        }
    </script>


        <style>
            .cart-item:hover {
                background-color: #f8f9fa;
            }

            .sticky-top {
                position: -webkit-sticky;
                position: sticky;
            }


        </style>


