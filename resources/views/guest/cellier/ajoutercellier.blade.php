<x-app-layout>
    <p class="titre">Ajouter un cellier</p>
    <section class="formAjoutCellier">
        <form action="{{ route('celliers.store', auth()->user()->id) }}" method="post">
            @csrf
            <div class="divAjoutCellier">
                <label  for="nom">Nom du cellier</label>
                <input type="text" name="nom" id="nom" placeholder="Entrez le nom du cellier">
            </div>

            <button class="btnRouge" type="submit">Ajouter</button>
        </form>
    </section>
</x-app-layout>