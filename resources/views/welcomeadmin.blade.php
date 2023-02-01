{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">
        <script differ src="https://kit.fontawesome.com/918ba06b86.js" crossorigin="anonymous"></script>
        <title>Vino Bueno - Admin</title>
    </head>
    <body> --}}
        {{-- <a href="{{ route('listecelliers') }}">Voir les celliers</a> --}}
        <x-app-layout>
        <a href="{{ route('admin.users') }}">Utilisateurs</a><br>
        <a href="{{ route('admin.bouteilles') }}">Bouteilles</a><br>
        <a href="{{ route('admin.celliers') }}">Celliers</a>
        </x-app-layout>
{{--     </body>
</html> --}}
