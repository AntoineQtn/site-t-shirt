@extends('layouts.frontoffice')

@section('title', 'Modifier le produit - ' . $product->name)

@section('content')
    <div class="container my-5">
        <!-- En-tête de la page -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="h2 mb-1">
                            <i class="fas fa-edit text-primary me-2"></i>
                            Modifier le produit
                        </h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('backoffice.dashboard') }}">
                                        <i class="fas fa-home"></i> Dashboard
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('backoffice.products') }}">Produits</a>
                                </li>
                                <li class="breadcrumb-item active">Modifier</li>
                            </ol>
                        </nav>
                    </div>
                    <a href="{{ route('backoffice.products') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-1"></i>Retour à la liste
                    </a>
                </div>
            </div>
        </div>

        <!-- Messages d'erreur -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h6><i class="fas fa-exclamation-triangle me-2"></i>Erreurs de validation :</h6>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Formulaire principal -->
        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-info-circle me-2"></i>Informations du produit
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('backoffice.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <!-- Nom du produit -->
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label fw-bold">
                                        <i class="fas fa-tag text-primary me-1"></i>Nom du produit *
                                    </label>
                                    <input type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           id="name"
                                           name="name"
                                           value="{{ old('name', $product->name) }}"
                                           placeholder="Ex: T-shirt Premium Coton"
                                           required>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Marque -->
                                <div class="col-md-6 mb-3">
                                    <label for="brand" class="form-label fw-bold">
                                        <i class="fas fa-award text-warning me-1"></i>Marque *
                                    </label>
                                    <input type="text"
                                           class="form-control @error('brand') is-invalid @enderror"
                                           id="brand"
                                           name="brand"
                                           value="{{ old('brand', $product->brand) }}"
                                           placeholder="Ex: Nike, Adidas..."
                                           required>
                                    @error('brand')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label for="description" class="form-label fw-bold">
                                    <i class="fas fa-align-left text-info me-1"></i>Description *
                                </label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                          id="description"
                                          name="description"
                                          rows="4"
                                          placeholder="Décrivez les caractéristiques, matières, style du t-shirt..."
                                          required>{{ old('description', $product->description) }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <!-- Prix -->
                                <div class="col-md-4 mb-3">
                                    <label for="price" class="form-label fw-bold">
                                        <i class="fas fa-euro-sign text-success me-1"></i>Prix (€) *
                                    </label>
                                    <div class="input-group">
                                        <input type="number"
                                               class="form-control @error('price') is-invalid @enderror"
                                               id="price"
                                               name="price"
                                               value="{{ old('price', $product->price) }}"
                                               step="0.01"
                                               min="0"
                                               placeholder="29.99"
                                               required>
                                        <span class="input-group-text">€</span>
                                        @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Quantité -->
                                <div class="col-md-4 mb-3">
                                    <label for="quantity" class="form-label fw-bold">
                                        <i class="fas fa-boxes text-secondary me-1"></i>Stock *
                                    </label>
                                    <input type="number"
                                           class="form-control @error('quantity') is-invalid @enderror"
                                           id="quantity"
                                           name="quantity"
                                           value="{{ old('quantity', $product->quantity) }}"
                                           min="0"
                                           placeholder="50"
                                           required>
                                    @error('quantity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Disponibilité -->
                                <div class="col-md-4 mb-3">
                                    <label class="form-label fw-bold">
                                        <i class="fas fa-toggle-on text-success me-1"></i>Statut
                                    </label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input"
                                               type="checkbox"
                                               id="available"
                                               name="available"
                                               value="1"
                                            {{ old('available', $product->available) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="available">
                                            Produit disponible à la vente
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Image actuelle et nouvelle image -->
                            <div class="mb-4">
                                <label for="image" class="form-label fw-bold">
                                    <i class="fas fa-image text-primary me-1"></i>Image du produit
                                </label>

                                @if($product->image)
                                    <div class="mb-3">
                                        <p class="text-muted mb-2">Image actuelle :</p>
                                        <img src="{{ asset('storage/' . $product->image) }}"
                                             alt="{{ $product->name }}"
                                             class="img-thumbnail"
                                             style="max-width: 200px; max-height: 200px;">
                                    </div>
                                @endif

                                <input type="file"
                                       class="form-control @error('image') is-invalid @enderror"
                                       id="image"
                                       name="image"
                                       accept="image/*">
                                <div class="form-text">
                                    <i class="fas fa-info-circle me-1"></i>
                                    Formats acceptés : JPG, PNG, GIF, SVG. Taille max : 2MB. Laissez vide pour conserver l'image actuelle.
                                </div>
                                @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Boutons d'action -->
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-outline-secondary" onclick="history.back()">
                                    <i class="fas fa-times me-1"></i>Annuler
                                </button>
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save me-1"></i>Enregistrer les modifications
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="col-lg-4">
                <!-- Informations du produit -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-info text-white">
                        <h6 class="card-title mb-0">
                            <i class="fas fa-info-circle me-2"></i>Informations
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-6">
                                <div class="border-end">
                                    <h5 class="text-primary">{{ $product->id }}</h5>
                                    <small class="text-muted">ID Produit</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <h5 class="text-success">{{ $product->available ? 'En ligne' : 'Hors ligne' }}</h5>
                                <small class="text-muted">Statut</small>
                            </div>
                        </div>
                        <hr>
                        <small class="text-muted">
                            <i class="fas fa-calendar me-1"></i>
                            Créé le : {{ $product->created_at->format('d/m/Y à H:i') }}<br>
                            <i class="fas fa-edit me-1"></i>
                            Modifié le : {{ $product->updated_at->format('d/m/Y à H:i') }}
                        </small>
                    </div>
                </div>
                <div class="card shadow-sm">
                    <div class="card-header bg-warning text-dark">
                        <h6 class="card-title mb-0">
                            <i class="fas fa-bolt me-2"></i>Actions rapides
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a href="{{ route('products.show', $product->id) }}"
                               class="btn btn-outline-primary btn-sm"
                               target="_blank">
                                <i class="fas fa-eye me-1"></i>Voir sur le site
                            </a>
                            <button type="button"
                                    class="btn btn-outline-danger btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteModal">
                                <i class="fas fa-trash me-1"></i>Supprimer ce produit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">
                        <i class="fas fa-exclamation-triangle me-2"></i>Confirmer la suppression
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Êtes-vous sûr de vouloir supprimer le produit <strong>"{{ $product->name }}"</strong> ?</p>
                    <p class="text-danger">
                        <i class="fas fa-warning me-1"></i>
                        Cette action est irréversible !
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <form action="{{ route('backoffice.products.delete', $product->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash me-1"></i>Supprimer définitivement
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.getElementById('image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    let preview = document.getElementById('image-preview');
                    if (!preview) {
                        preview = document.createElement('img');
                        preview.id = 'image-preview';
                        preview.className = 'img-thumbnail mt-2';
                        preview.style.maxWidth = '200px';
                        preview.style.maxHeight = '200px';
                        e.target.parentNode.appendChild(preview);
                    }
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
