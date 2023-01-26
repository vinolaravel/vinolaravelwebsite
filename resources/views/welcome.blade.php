<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">
        <title>Vino Bueno</title>

    </head>
    <body>
        <div class="accueilContent">
            <div class="landingPage">
                <div>
                    <div class="titreLanding">
                        <h1><i>Vino</i></h1>
                        <h3>Jamais à sec grâce à mon cellier connecté!</h3>
                    </div>
                    <div class="liens">
                    <a href="{{ route('login') }}">Se connecter</a>
                    <a href="{{ route('register') }}">Créer un compte</a>
                    </div>
                </div>    
            </div>
        </div>
    </body>
</html>
