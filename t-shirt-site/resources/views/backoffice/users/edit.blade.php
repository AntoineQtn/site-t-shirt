<!DOCTYPE html>
<html>
<head>
    <title>Modifier l'utilisateur</title>
</head>
<body>
    <h1>Modifier l'utilisateur : {{ $user->name }}</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('backoffice.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nom :</label><br>
        <input type="text" name="name" value="{{ old('name', $user->name) }}" required><br><br>

        <label>Email :</label><br>
        <input type="email" name="email" value="{{ old('email', $user->email) }}" required><br><br>

        <label>Nouveau mot de passe (facultatif) :</label><br>
        <input type="password" name="password"><br><br>

        <label>Confirmer le mot de passe :</label><br>
        <input type="password" name="password_confirmation"><br><br>

        <button type="submit">Enregistrer les modifications</button>
    </form>

    <br>
    <a href="{{ route('backoffice.users.index') }}">⬅ Retour à la liste</a>
</body>

    <br></br>

 <a href="{{ route('backoffice') }}"> Retour au tableau de bord</a>

</html>


