<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Boutique T-shirts')</title>
</head>
<body>
<a href="#">
    Panier
</a>
<main>
    @yield('content')
</main>

@include('components/footer')

</body>
</html>
