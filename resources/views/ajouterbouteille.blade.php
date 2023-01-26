<x-app-layout>
    <form action="{{ route('bouteilles.store', $cellier->id) }}" method="post" enctype="multipart/form-data">
        @csrf

        <button id="btnSAQ">Choisir une bouteille de la SAQ</button>
        <button id="btnPerso">Insérer une nouvelle bouteille (hors SAQ)</button>
        
        <template id="saqTemplate">
            <div id="divSelect">
                <label for="nom">Nom de la bouteille</label>
                <select name="nom" id="nomSelect">
                    <option value="">--Choisissez une bouteille--</option>
                    @foreach ($bouteilles as $bouteille)
                        <option value="{{ $bouteille->nom }}">{{ $bouteille->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="prix_achat">Prix d'achat</label>
                <input type="number" name="prix_achat" id="prix_achat" placeholder="entrez prix">
            </div>

            <div>
                <label for="date_achat">Date d'achat</label>
                <input type="date" name="date_achat" id="date_achat" placeholder="Entrez la date d'achat">
            </div>

            <div>
                <label for="millesime">Millesime</label>
                <input type="year" name="millesime" id="millesime" placeholder="Entrez le millesime">
            </div>

            <div>
                <label for="garde_jusqua">Garde jusqu'a</label>
                <input type="date" name="garde_jusqua" id="garde_jusqua" placeholder="Entrez la date de garde">
            </div>

            <div>
                <label for="quantite">Quantite</label>
                <input type="number" name="quantite" id="quantite" placeholder="Entrez la quantite">
            </div>
        </template>        

        <template id="newBouteilleTemplate">
            <div>
                <label for="nom">Nom de la bouteille</label>
                <input type="text" name="nom" id="nom" placeholder="Entrez le nom de la bouteille">
            </div>

            <div>
                <label for="image">Image</label>
                <input type="file" name="image" id="image" accept=".jpg, .png, .jpeg">
            </div>

            <div>
                <label for="pays">Pays</label>
                <input type="text" name="pays" id="pays" placeholder="Entrez le pays">
            </div>

            <div>
                <label for="date_achat">Date d'achat</label>
                <input type="date" name="date_achat" id="date_achat" placeholder="Entrez la date d'achat">
            </div>

            <div>
                <label for="prix_achat">Prix d'achat</label>
                <input type="number" name="prix_achat" id="prix_achat" placeholder="entrez prix">
            </div>

            <div>
                <label for="type">Type</label>
                <select name="type_id" id="type">
                    <option value="1">Vin blanc</option>
                    <option value="2">Vin rouge</option>
                </select>
            </div>

            <div>
                <label for="quantite">Quantite</label>
                <input type="number" name="quantite" id="quantite" placeholder="Entrez la quantite">
            </div>

            <div>
                <label for="millesime">Millesime</label>
                <input type="year" name="millesime" id="millesime" placeholder="Entrez le millesime">
            </div>

            <div>
                <label for="garde_jusqua">Garde jusqu'a</label>
                <input type="date" name="garde_jusqua" id="garde_jusqua" placeholder="Entrez la date de garde">
            </div>

            <div>
                <label for="format">Format</label>
                <select name="format_id" id="format">
                    <option value="750ml">750 ml</option>
                    <option value="1000ml">1000 ml</option>
                    <option value="1250ml">1250 ml</option>
                    <option value="1500ml">1500 ml</option>

                </select>
            </div>

            <div>
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="10"></textarea>
            </div>
        </template>


        <div id="saqBouteille" style="display: none"></div>
        
        <section id="newBouteille" style="display: none"></section>

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</x-app-layout>


<script>
    (function(){
        let btnSAQ = document.getElementById('btnSAQ'),
            btnPerso = document.getElementById('btnPerso'),
            saqBouteille = document.getElementById('saqBouteille'),
            newBouteille = document.getElementById('newBouteille'),
            saqTemplate = document.getElementById('saqTemplate'),
            newBouteilleTemplate = document.getElementById('newBouteilleTemplate');
            
        btnSAQ.addEventListener('click', function(){
            newBouteille.innerHTML = '';
            let cloneSAQ = saqTemplate.content.cloneNode(true);
            saqBouteille.appendChild(cloneSAQ);
            saqBouteille.style.display = 'block';
            btnSAQ.disabled = true;
            btnPerso.disabled = false;
        });

        btnPerso.addEventListener('click', function(){
            saqBouteille.innerHTML = '';
            let cloneNewBouteille = newBouteilleTemplate.content.cloneNode(true);
            newBouteille.appendChild(cloneNewBouteille);
            newBouteille.style.display = 'block';
            btnPerso.disabled = true;
            btnSAQ.disabled = false;
        });
    })()
</script>