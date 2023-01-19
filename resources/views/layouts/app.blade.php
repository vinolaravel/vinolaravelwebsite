<!DOCTYPE html>
<html>
<head>
    <title>Vino App</title>
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
</head>
<body>

    
    
    @yield('contenu')



    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center">© 2023 - Tous droits réservés</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>