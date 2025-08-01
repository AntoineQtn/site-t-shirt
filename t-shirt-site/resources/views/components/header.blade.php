@extends('components/layout')

@section('content')
    <h1>Header</h1>

 <button type="submit">Créer mon compte</button>

<br><br>

<a href="{{ route('login.submit') }}">J'ai déjà un compte, me connecter</a>
        <a href="/cart">Panier</a>
@endsection
