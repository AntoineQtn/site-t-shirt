@extends('components/layout')

@section('title', 'Liste des T-shirts')

@section('content')
    <div>
        <h1>Nos T-shirts</h1>

        @if($products->count() > 0)
            <div>
                @foreach($products as $product)
                    <div>
                        <div>
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}"
                                     alt="{{ $product->name }}"
                                     >
                            @else
                                <div>
                                    <span>Pas d'image</span>
                                </div>
                            @endif
                        </div>

                        <div>
                            <h3>{{ $product->name }}</h3>

                            @if($product->description)
                                <p>
                                    {{ Str::limit($product->description, 100) }}
                                </p>
                            @endif

                            <div>
                                <span>{{ number_format($product->price, 2) }} €</span>

                                @if($product->stock_quantity > 0)
                                    <span>En stock ({{ $product->stock_quantity }})</span>
                                @else
                                    <span>Rupture de stock</span>
                                @endif
                            </div>


                            <div>
                                <a href="{{ route('products.show', $product->id) }}">
                                    Voir détails
                                </a>

                                @if($product->stock_quantity > 0)
                                    <button onclick="addToCart({{ $product->id }})">
                                        <i></i>
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div>
                <h2>Aucun produit disponible</h2>
                <p>Revenez plus tard pour découvrir nos nouveaux t-shirts !</p>
            </div>
        @endif
    </div>

    <script>
        function addToCart(productId) {
            alert('Produit ajouté au panier ! (ID: ' + productId + ')');
        }
    </script>
@endsection
