<x-app-layout>
<section class="containerCatalogue">
    @forelse ($bouteilles as $bouteille)
    <div class="carteCatalogue">
        <h1><b>nom du cellier:</b> {{ $cellier->nom }}</h1>

        <div class="bouteille">
            <h1><b>id de la bouteille:</b> {{ $bouteille->id }}</h1>
            <img src="{{ $bouteille->image }}" alt="{{ $bouteille->nom }}">
            <h2><b>nom de la bouteille:</b> {{ $bouteille->nom }}</h2>
            <h3><b>quantite:</b> {{ $bouteille->quantite }}</h3>
            {{-- <a href="{{ route('bouteilles.show', $bouteille->id) }}">Les détails de la bouteille</a> --}}

        </div>
        <div class="options">
            <form action="{{ route('bouteilles.drink', [$cellier->id, $bouteille->id]) }}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger">Boire</button>
            </form>

            <form action="{{ route('bouteilles.add', [$cellier->id, $bouteille->id]) }}" method="post">
                @csrf
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>

            <form action="{{ route('bouteilles.remove', [$cellier->id, $bouteille->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Enlever</button>
            </form>
        </div>
    </div>
    {{-- ici --}}
    @empty
    <p>Aucune bouteille disponible</p>
    @endforelse
</section>

<a href="{{ route('celliers') }}">Retour à la liste des celliers</a>
<a href="{{ route('bouteilles.create', $cellier->id) }}">Ajouter une bouteille de vin au cellier</a>


</x-app-layout>