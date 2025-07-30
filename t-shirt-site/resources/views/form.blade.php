<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Formulaire Laravel</title>
</head>
<body>
    <h1>Formulaire de contact</h1>
    <form action="{{ route('form.submit') }}" method="POST">
        @csrf
        <label for="name">Nom :</label><br>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required><br><br>

        <label for="email">Email :</label><br>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required><br><br>

        <button type="submit">Envoyer</button>
    </form>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>
