@extends('layouts.frontoffice')

@include('components.header')



    <div class="container-fluid">
        <div class="row justify-content-center my-4">
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Rechercher un t-shirt...">
                    <button class="btn btn-outline-primary" type="button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="alert alert-info text-center mb-4" role="alert">
            <div class="mb-2">
                <i class="fas fa-shield-alt me-2"></i>
                Satisfait ou remboursé – 14 jours pour changer d'avis
            </div>
            <div class="fw-bold text-danger">
                <i class="fas fa-fire me-2"></i>
                Soldes d'été – 2ème démarque ! Jusqu'à <span class="badge bg-danger">80%</span> sur les Nikes bleues
            </div>
        </div>

        <section class="mb-5">
            <div class="container">
                <h2 class="text-center mb-4">
                    <i class="fas fa-star text-warning me-2"></i>Suggestions
                </h2>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm">
                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Suggestion 1">
                            <div class="card-body text-center">
                                <h5 class="card-title">T-shirt Premium</h5>
                                <p class="card-text text-muted">Suggestion 1</p>
                                <span class="badge bg-success fs-6">-20%</span>
                                <div class="mt-3">
                                    <button class="btn btn-primary">
                                        <i class="fas fa-shopping-cart me-1"></i>Ajouter
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm">
                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Suggestion 2">
                            <div class="card-body text-center">
                                <h5 class="card-title">T-shirt Vintage</h5>
                                <p class="card-text text-muted">Suggestion 2</p>
                                <span class="badge bg-warning fs-6">-35%</span>
                                <div class="mt-3">
                                    <button class="btn btn-primary">
                                        <i class="fas fa-shopping-cart me-1"></i>Ajouter
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm">
                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Suggestion 3">
                            <div class="card-body text-center">
                                <h5 class="card-title">T-shirt Sport</h5>
                                <p class="card-text text-muted">Suggestion 3</p>
                                <span class="badge bg-danger fs-6">-50%</span>
                                <div class="mt-3">
                                    <button class="btn btn-primary">
                                        <i class="fas fa-shopping-cart me-1"></i>Ajouter
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-5">
            <div class="container">
                <h2 class="text-center mb-4">
                    <i class="fas fa-tags text-primary me-2"></i>Top Catégories
                </h2>
                <div class="row g-4 justify-content-center">
                    <div class="col-md-5">
                        <div class="card h-100 shadow-sm border-primary">
                            <div class="card-body text-center">
                                <i class="fas fa-male fa-3x text-primary mb-3"></i>
                                <h4 class="card-title">T-shirt Homme</h4>
                                <p class="card-text text-muted">Collection masculine</p>
                                <span class="badge bg-primary fs-6 mb-3">-20%</span>
                                <div>
                                    <a href="{{ route('products.index') }}" class="btn btn-outline-danger">
                                        <i class="fas fa-eye me-1"></i>Voir la collection
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card h-100 shadow-sm border-danger">
                            <div class="card-body text-center">
                                <i class="fas fa-female fa-3x text-danger mb-3"></i>
                                <h4 class="card-title">T-shirt Femme</h4>
                                <p class="card-text text-muted">Collection féminine</p>
                                <span class="badge bg-danger fs-6 mb-3">-20%</span>
                                <div>
                                    <a href="{{ route('products.index') }}" class="btn btn-outline-danger">
                                        <i class="fas fa-eye me-1"></i>Voir la collection
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@include('components.footer')
