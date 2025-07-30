<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Tableau de Bord Utilisateur</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            max-width: 800px;
            margin: 50px auto;
        }
        h1 {
            color: #0056b3;
            margin-bottom: 20px;
        }
        p {
            line-height: 1.6;
        }
        .logout-form {
            margin-top: 30px;
            text-align: right;
        }
        .logout-form button {
            background-color: #dc3545;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }
        .logout-form button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Bienvenue sur votre Tableau de Bord, {{ Auth::user()->name }} !</h1>
    <p>
        C'est votre espace personnel. Vous pouvez y accéder à toutes les fonctionnalités de votre compte utilisateur.
        Ici, vous pourrez par exemple voir l'historique de vos commandes, gérer vos informations personnelles,
        ou consulter vos messages.
    </p>

    <h2>Vos informations de base :</h2>
    <ul>
        <li><strong>Nom :</strong> {{ Auth::user()->name }}</li>
        <li><strong>Email :</strong> {{ Auth::user()->email }}</li>
        <li><strong>Rôle :</strong> {{ Auth::user()->role }}</li>
    </ul>


    <h3>Mes dernières commandes</h3>
    <ul>
        <li>Commande #1234 - Date: 2023-07-25 - Statut: Livré</li>
        <li>Commande #5678 - Date: 2023-07-28 - Statut: En cours</li>
    </ul>

    <h3>Modifier mon profil</h3>
    <a href="/profile/edit">Accéder à la modification de profil</a>


    <div class="logout-form">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Déconnexion</button>
        </form>
    </div>
</div>
</body>
</html>
