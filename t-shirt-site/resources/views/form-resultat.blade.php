<div>
    <!-- We must ship. - Taylor Otwell -->
</div>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Données reçues</title>
</head>
<body>
    <h1>Données reçues</h1>
    <p><strong>Nom :</strong> {{ $data['name'] }}</p>
    <p><strong>Email :</strong> {{ $data['email'] }}</p>

    <a href="{{ url('/form') }}">Retour au formulaire</a>
</body>
</html>
