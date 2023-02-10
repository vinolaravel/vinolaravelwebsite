<x-app-layout>
    <div class="flexBtnAjouterCellier">
        <a class="btnRouge" href="{{ route('celliers.create', auth()->user()->id) }}">Créer un cellier</a>
    </div>
    @forelse ($celliers as $cellier)
        <div class="cellier">
            <div class="flexImgMapNomCellier">
                <img src="/img/map.png" alt="map">
                <span data-js-nom-cellier class="nomCellier">{{ $cellier->nom }}</span>
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
                        <button data-js-btn-supp class="btnRouge btnSupp">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="flexDivACBtnAC">
            <p class="paraAucunCellier">Aucun cellier disponible</p>
        </div>
        @endforelse


        </x-app-layout>
        <div class="modal-overl">
            <div class="modal-contenu">
                <div>
                    <h4>Supprimer le cellier <span data-js-nom-cellier-modal></span></h4>
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

            let celliers = document.querySelectorAll('.cellier');
            for (let i = 0; i < celliers.length; i++) {
                let cellierForm = celliers[i].querySelector('form');
                let btnSupp = celliers[i].querySelector('.btnSupp');

                btnSupp.addEventListener('click', function (e) {
                    e.preventDefault();
                    let modal = document.querySelector('.modal-overl');
                    let nomCellier = document.querySelectorAll('[data-js-nom-cellier]')[i].textContent;
                    let nomCellierModal = document.querySelector('[data-js-nom-cellier-modal]');
                    nomCellierModal.textContent = nomCellier;
                    // display flex for modal
                    modal.style.display = 'flex';
                    
                    let btnYes = document.querySelector('.yes');
                    btnYes.addEventListener('click', function () {
                        cellierForm.submit();
                    });

                    let btnNo = document.querySelector('.no');
                    btnNo.addEventListener('click', function () {
                        modal.style.display = 'none';
                    });
                });
            }
            
        </script>