<x-app-layout>
    <div class="flexBtnAjouterCellier">
        <a class="btnRouge" href="{{ route('celliers.create', auth()->user()->id) }}">Créer un cellier</a>
    </div>
    @forelse ($celliers as $cellier)
        <div class="cellier">
            <div class="flexImgMapNomCellier">
                <img src="/img/map.png" alt="map">
                <span class="nomCellier">{{ $cellier->nom }}</span>
            </div>
            @if ($cellier->nbBouteilles == 0)
                <p>Ce cellier est vide!</p>                
            @endif
            @if ($cellier->nbBouteilles > 0)
                @if ($cellier->nbBouteilles == 1)
                    <p>Contient 1 bouteille</p>
                    
                @else 
                    <p>Contient {{ $cellier->nbBouteilles }} bouteilles</p>
                @endif
            @endif
            <a href="{{ route('celliers.show', $cellier->id) }}">Voir le contenu du cellier</a>

            <div class="flexSuppModifCellier"> 
                <div>
                    <a  href="{{ route('celliers.edit', $cellier->id) }}">
                       <button class="btnVert"> Modifier</button>
                    </a>
                </div>

                <div>
                    <form action="{{ route('celliers.destroy', $cellier->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btnRouge btnSupp">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="flexDivACBtnAC">
            <p class="paraAucunCellier">Aucun cellier disponible</p>
        </div>
        @endforelse
            <!-- <a href="{{ route('celliers.create', auth()->user()->id) }}">Créer un nouveau cellier</a> -->
</x-app-layout>
