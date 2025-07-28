@extends('layouts.backoffice')

@include('components.header')

@section('title', 'Votre Panier')

@section('content')
    <form method="POST" action="{{ route('') }}">
        @csrf
        <button type="submit" class="btn btn-success">Créer le produit</button>

    </form>
@endsection

@include('components.footer')
