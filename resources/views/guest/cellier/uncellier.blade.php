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
           
            <div class="flexImgBtlInfo">

                <div data-js-bouteille class="divImgBouteille">
                    
                    @if (substr($bouteille->image, 0, 8) == 'https://')
                    <img class="imgBouteille" src="{{ $bouteille->image }}" alt="{{ $bouteille->nom }}">
                    @else
                    <img class="imgBouteille" src="{{ asset('images/' . $bouteille->image) }}" alt="{{ $bouteille->nom }}">
                    @endif
                </div>
                <div>
                    
                    <div class="divNomBouteille">
                        <p>{{ $bouteille->nom }}</p>
                    </div>
                    <p><b>Quantité:</b> {{ $bouteille->quantite }}</p>
                    <p>Vin {{ $bouteille->type->type }} | {{ $bouteille->format }} | {{ $bouteille->pays }}</p>
                    <p><b>Prix d'achat:</b> {{ $bouteille->prix_achat }}$</p>
                    <p><b>Achetée le:</b> {{ $bouteille->date_achat }}</p>
                    
                </div>
            </div>

            <div class="flexIconeBouteille">
                
                <form data-js-form action="{{ route('bouteilles.add', [$cellier->id, $bouteille->id]) }}" method="post">
                    @csrf
                    <div>
                        <img src="/img/ajouter.png" alt="ajouter">
                        <p>Ajouter</p>
                    </div>
                </form>
                
                <form data-js-form action="{{ route('bouteilles.drink', [$cellier->id, $bouteille->id]) }}" method="post">
                    @csrf
                    <div>
                        <img src="/img/boire.png" alt="boire">
                        <p>Boire</p>
                    </div>
                </form>
                
                <form data-js-form-delete action="{{ route('bouteilles.remove', [$cellier->id, $bouteille->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <div data-js-btn-supp>
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
<div class="modal-overl">
    <div class="modal-contenu">
        <div class="flexCenterModalImg">
            <img src="" alt="bouteille de vin" data-js-bouteille-modal>
            <h4>Supprimer la bouteille </h4>
        </div>
        <div>
            <p>Etes-vous sûr ?</p>
        </div>
        <div class="modal-buttons">
            <button class="yes">Oui</button>
            <button class="no">Non</button>
        </div>
    </div>
</div>


        <script>

            let catalogue = document.querySelectorAll('.carteCatalogue');
            for (let i = 0; i < catalogue.length; i++) {
                let bouteilleFormDelete = catalogue[i].querySelector('[data-js-form-delete]');
                let btnSupp = catalogue[i].querySelector('[data-js-btn-supp]');

                btnSupp.addEventListener('click', function (e) {
                    e.preventDefault();

                    console.log(bouteilleFormDelete);

                    let modal = document.querySelector('.modal-overl');
                    let imageBouteille = document.querySelectorAll('[data-js-bouteille]')[i].querySelector('img').src;
                    let imageBouteilleModal = document.querySelector('[data-js-bouteille-modal]');
                    imageBouteilleModal.src = imageBouteille;


                    modal.style.display = 'flex';
                    
                    let btnYes = document.querySelector('.yes');
                    btnYes.addEventListener('click', function () {
                        bouteilleFormDelete.submit();
                    });

                    let btnNo = document.querySelector('.no');
                    btnNo.addEventListener('click', function () {
                        modal.style.display = 'none';
                    });
                });
            }
            


            let form = document.querySelectorAll('[data-js-form]');
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
