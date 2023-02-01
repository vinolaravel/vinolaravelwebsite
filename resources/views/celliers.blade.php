<x-app-layout>
    @forelse ($celliers as $cellier)
        <div class="cellier">
            <span class="nomCellier">{{ $cellier->nom }}</span>
            @if ($cellier->nbBouteilles == 0)
                <h3>Ce cellier est vide!</h3>                
            @endif
            @if ($cellier->nbBouteilles > 0)
                @if ($cellier->nbBouteilles == 1)
                    <h3>Contient 1 bouteille</h3>
                    
                @else 
                    <h3>Contient {{ $cellier->nbBouteilles }} bouteilles</h3>
                @endif
            @endif
            <a href="{{ route('celliers.show', $cellier->id) }}">Voir le contenu du cellier</a>

            <form action="{{ route('celliers.destroy', $cellier->id) }}" method="post" class="petitForm">
                @csrf
                @method('DELETE')
                <button type="submit" class="myButton">Supprimer</button>
            </form>

            <a href="{{ route('celliers.edit', $cellier->id) }}">
                <button class="myButton">Modifier</button>
            </a>
        </div>
        @empty
            <p>Aucun cellier disponible</p>
            <a href="{{ route('celliers.create', auth()->user()->id) }}">Créer un cellier</a>
        @endforelse
            <a href="{{ route('celliers.create', auth()->user()->id) }}">Créer un nouveau cellier</a>
</x-app-layout>
