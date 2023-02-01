<x-app-layout>
    <h1><b><u>Cellier:</u></b> {{ $cellier->nom }}</h1>
    @forelse ($bouteilles as $bouteille)
        <div class="carteCatalogue">
            @if (substr($bouteille->image, 0, 8) == 'https://')
                <img src="{{ $bouteille->image }}" alt="{{ $bouteille->nom }}">
            @else
                <img src="{{ asset('images/' . $bouteille->image) }}" alt="{{ $bouteille->nom }}">
            @endif
            <h2>{{ $bouteille->nom }}</h2>
            <h3><b>quantité:</b> {{ $bouteille->quantite }}</h3>
            <span>Vin {{ $bouteille->type->type }} | {{ $bouteille->format }} | {{ $bouteille->pays }}</span><br>
            <span><b>Prix d'achat:</b> {{ $bouteille->prix_achat }}$</span><br>
            <span><b>Achetée le:</b> {{ $bouteille->date_achat }}</span>
        </div>

        <div class="options">
            <form action="{{ route('bouteilles.drink', [$cellier->id, $bouteille->id]) }}" method="post">
                @csrf
                <button type="submit">Boire</button>
            </form>

            <form action="{{ route('bouteilles.add', [$cellier->id, $bouteille->id]) }}" method="post">
                @csrf
                <button type="submit">Ajouter</button>
            </form>

            <form action="{{ route('bouteilles.remove', [$cellier->id, $bouteille->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">Supprimer</button>
            </form>

            <a href="{{ route('bouteilles.edit', [$cellier->id, $bouteille->id]) }}">
                <button>Modifier</button>
            </a>
        </div>
    @empty
        <p>Aucune bouteille disponible</p>
    @endforelse

    <a href="{{ route('celliers') }}">Retour à la liste des celliers</a>
    <a href="{{ route('bouteilles.create', $cellier->id) }}">Ajouter une bouteille de vin au cellier</a>
</x-app-layout>