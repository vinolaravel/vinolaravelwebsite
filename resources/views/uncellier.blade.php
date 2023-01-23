<x-app-layout>
    <h1><b>nom du cellier:</b> {{ $cellier->nom }}</h1>
    @forelse ($bouteilles as $bouteille)
        <div class="bouteille">
            <h1><b>id de la bouteille:</b> {{ $bouteille->id }}</h1>
            <h2><b>nom de la bouteille:</b> {{ $bouteille->nom }}</h2>
            <h3><b>quantite:</b> {{ $bouteille->quantite }}</h3>
            {{-- <a href="{{ route('bouteilles.show', $bouteille->id) }}">Les détails de la bouteille</a> --}}
        </div>
        <form action="{{ route('bouteilles.drink', [$cellier->id, $bouteille->id]) }}" method="post">
            @csrf
            <button type="submit" class="btn btn-danger">Boire</button>
        </form>

        <form action="{{ route('bouteilles.add', [$cellier->id, $bouteille->id]) }}" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>

        {{-- <form action="{{ route('bouteilles.remove', [$cellier->id, $bouteille->id]) }}" method="post">
            @csrf
            <button type="submit" class="btn btn-danger">Enlever</button>
        </form> --}}

        {{-- modifier une bouteille --}}
    @empty
        <p>Aucune bouteille disponible</p>
        <a href="">Cliquez ici pour ajouter une bouteille</a>
    @endforelse

    <a href="{{ route('celliers') }}">Retour à la liste des celliers</a>
    {{-- <a href="{{ route('bouteilles.create') }}">Ajouter une bouteille de vin au cellier</a> --}}
</x-app-layout>