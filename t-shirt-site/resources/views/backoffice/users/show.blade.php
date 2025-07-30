<!DOCTYPE html>
<html>
<head>
    <title>Détail de l'utilisateur</title>
</head>
<body>
    <h1>Détail de l'utilisateur</h1>

    <p><strong>ID :</strong> {{ $user->id }}</p>
    <p><strong>Nom :</strong> {{ $user->name }}</p>
    <p><strong>Email :</strong> {{ $user->email }}</p>
    <p><strong>Créé le :</strong> {{ $user->created_at->format('d/m/Y H:i') }}</p>
    <p><strong>Mis à jour le :</strong> {{ $user->updated_at->format('d/m/Y H:i') }}</p>

    <br>
    <a href="{{ route('backoffice.users.index') }}">⬅ Retour à la liste</a>
</body>
    <br></br>

     <a href="{{ route('backoffice') }}"> Retour au tableau de bord</a>
</html>
