@extends('components/layout')

@section('content')
    <h1>Header</h1>

<form action="{{ route('account.submit') }}" method="POST">
    @csrf
    <!-- Champs nom, email, mot de passe, etc. -->

   <a href="{{ route('account.submit') }}" style="display:inline-block; padding:10px 20px; background:#3490dc; color:white; text-decoration:none; border-radius:5px;">
    Créer mon compte
</a>

<br>

<a href="{{ route('account.submit') }}">Déjà inscrit ? Se connecter ici</a>



@endsection
