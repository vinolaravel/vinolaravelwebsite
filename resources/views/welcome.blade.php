<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">
        <script differ src="https://kit.fontawesome.com/918ba06b86.js" crossorigin="anonymous"></script>
        <title>Vino Bueno</title>

    </head>
    <body class="bodyLanding">
        <div class="landingPage">
            <div class="titreLanding">
                <h1>Vino <span class="bueno">Bueno</span></h1>
                <h3><span class="mcc">Jamais à sec</span> grâce à mon cellier connecté!</h3>
            </div>
            <div class="liens">
                <a href="{{ route('login') }}">Se connecter</a>
                <a href="{{ route('register') }}">Créer un compte</a>
            </div>
        </div>
    </body>
</html>
