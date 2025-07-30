@extends('layouts.frontoffice')

@section('content')
    <a href="{{ route('basket.cart') }}" class="btn-panier">
        <i class="fas fa-shopping-cart"></i> Panier
    </a>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Connexion</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <!-- Champs email et password -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
