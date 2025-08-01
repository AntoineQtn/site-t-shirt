<!DOCTYPE html>
<html>
<head>
    <title>Créer ou se connecter</title>
</head>
<body>
    <h1>Créer un compte utilisateur</h1>


@if ($errors->any())
    <div>
        <ul style="color:red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="{{ route('account.submit') }}" method="POST">
        @csrf

        <label>Nom :</label><br>
        <input type="text" name="name" required><br><br>

        <label>Email :</label><br>
        <input type="email" name="email" required><br><br>

        <label>Mot de passe :</label><br>
        <input type="password" name="password" required><br><br>

        <label>Confirmer le mot de passe :</label><br>
        <input type="password" name="password_confirmation" required><br><br>

        <button type="submit">Créer mon compte</button>
    </form>

    <hr>

    <h2>Déjà inscrit ? Connectez-vous ici</h2>

    <form action="{{ route('login.custom') }}" method="POST">
        @csrf

        <label>Email :</label><br>
        <input type="email" name="email" required><br><br>

        <label>Mot de passe :</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Se connecter</button>
    </form>
</body>
</html>
