<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">
    <title>Vino Bueno</title>

</head>

<body>
    <div class="accueilContent">
        {{-- le logo ici --}}
        {{-- le reste du menu ici comme celliers/creer un cellier/ profil ... etc--}}
        {{-- @if (Route::has('login'))
                <div>
                    @auth
                        <a href="{{ url('/celliers') }}">page des celliers</a>
        @else
        <a href="{{ route('login') }}">Connexion</a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}">Inscription</a>
        @endif
        @endauth
    </div>
    @endif --}}

    {{-- @auth--}}
    <div class="accueilContent">
        {{-- <div class="accueilTitle">
                    vous etes a la page d'accueil
                    <a href="{{ url('/celliers') }}">Voir vos celliers</a>
    </div>
    </div>
    @else
    <div>
        <div>

        </div>
    </div>--}}
    <div class="landingPage">

        <div>
            <div class="titreLanding">
                <h1><i>Vino</i></h1>
                <h3>Jamais à sec grace à mon cellier connecté!</h3>
            </div>
            <div class="liens">
            <a href="{{ route('login') }}">Se connecter</a>
            <a href="{{ route('register') }}">Creer un compte</a>
            </div>
        </div>
        {{-- @endauth--}}

    </div>


    {{-- footer ici si tu veux --}}
    </div>
</body>

</html>