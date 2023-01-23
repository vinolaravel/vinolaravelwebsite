<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Vino Bueno</title>

    </head>
    <body class="antialiased">
        <div>
            {{-- le logo ici --}}
            {{-- le reste du menu ici comme celliers/creer un cellier/ profil ... etc--}}
            @if (Route::has('login'))
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
            @endif

            @auth
            <div class="accueilContent">
                <div class="accueilTitle">
                    vous etes a la page d'accueil
                    <a href="{{ url('/celliers') }}">Voir vos celliers</a>
                </div>
            </div>
                @else
            <div class="accueilContent">
                <div class="accueilTitle">
                    Bienvenue à <h1>Vino Bueno</h1>
                </div>
            </div>
            <div class="accueilText">
                <p><a href="{{ route('login') }}">Connectez-vous</a> ou <a href="{{ route('register') }}">creez un compte</a></p>
            </div>
                @endauth
            
            </div>


            {{-- footer ici si tu veux --}}
        </div>
    </body>
</html>
