<!DOCTYPE html>
<html>
<head>
    <title>Créer un utilisateur</title>
</head>
<body>
    <h1>Créer un nouvel utilisateur</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('backoffice.users.store') }}" method="POST">
        @csrf

        <label>Nom :</label><br>
        <input type="text" name="name" value="{{ old('name') }}" required><br><br>

        <label>Email :</label><br>
        <input type="email" name="email" value="{{ old('email') }}" required><br><br>

        <label>Mot de passe :</label><br>
        <input type="password" name="password" required><br><br>

        <label>Confirmer le mot de passe :</label><br>
        <input type="password" name="password_confirmation" required><br><br>

        <button type="submit">Créer</button>
    </form>

    <br>
    <a href="{{ route('backoffice.users.index') }}">⬅ Retour à la liste</a>
</body>
</html>

    <br></br>

 <a href="{{ route('backoffice') }}"> Retour au tableau de bord</a>