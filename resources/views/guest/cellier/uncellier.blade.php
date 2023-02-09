<x-app-layout>
    <!-- <a href="{{ route('celliers') }}">Liste des celliers</a> -->
    <div class="centrerNomCellier">
        <p class="nomCellier">Cellier: {{ $cellier->nom }}</p>
    </div>
    <div class="flexBtnAjouterCellier">
        <a class="btnRouge" href="{{ route('bouteilles.create', $cellier->id) }}">Ajouter une bouteille de vin au cellier</a>
    </div>
    
    <div class="flexBouteilleCellier">
    @forelse ($bouteilles as $bouteille)
        <div class="carteCatalogue">
            @if (substr($bouteille->image, 0, 8) == 'https://')
                <img src="{{ $bouteille->image }}" alt="{{ $bouteille->nom }}">
            @else
                <img src="{{ asset('images/' . $bouteille->image) }}" alt="{{ $bouteille->nom }}">
            @endif
            <div class="divNomBouteille">
                <p>{{ $bouteille->nom }}</p>
            </div>
            <h3><b>Quantité:</b> {{ $bouteille->quantite }}</h3>
            <span>Vin {{ $bouteille->type->type }} | {{ $bouteille->format }} | {{ $bouteille->pays }}</span><br>
            <span><b>Prix d'achat:</b> {{ $bouteille->prix_achat }}$</span><br>
            <span><b>Achetée le:</b> {{ $bouteille->date_achat }}</span>
        

            <div class="flexIconeBouteille">
                
                <form action="{{ route('bouteilles.add', [$cellier->id, $bouteille->id]) }}" method="post">
                    @csrf
                    <div>
                        <img src="/img/ajouter.png" alt="ajouter">
                        <p>Ajouter</p>
                    </div>
                </form>
                
                <form action="{{ route('bouteilles.drink', [$cellier->id, $bouteille->id]) }}" method="post">
                    @csrf
                    <div>
                        <img src="/img/boire.png" alt="boire">
                        <p>Boire</p>
                    </div>
                </form>
                
                <form action="{{ route('bouteilles.remove', [$cellier->id, $bouteille->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <div>
                        <img src="/img/delete.png" alt="supprimer">
                        <p>Supprimer</p>
                    </div>
                </form>
                    
                <a href="{{ route('bouteilles.edit', [$cellier->id, $bouteille->id]) }}">
                    <img src="/img/edit.png" alt="modifier">
                    <p>Modifier</p>
                </a>
                
            </div>
        </div>
        
        @empty
        <div class="flexDivACBtnAC ">
            <p class="paraAucunCellier">Aucune bouteille disponible</p>
        </div>
        @endforelse
    </div>
        

</x-app-layout>

<script>
    let form = document.querySelectorAll('form');
    for(let i = 0; i < form.length; i++){
        let img = form[i].querySelector('img');
        let p = form[i].querySelector('p');
        img.addEventListener('click', function(){
            form[i].submit();
        });
        p.addEventListener('click', function(){
            form[i].submit();
        });
    }
    
</script>