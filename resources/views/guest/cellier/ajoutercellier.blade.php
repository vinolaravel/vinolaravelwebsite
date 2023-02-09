<x-app-layout>
    <p class="titre">Ajouter un cellier</p>
    <section class="formAjoutCellier">
        <form action="{{ route('celliers.store', auth()->user()->id) }}" method="post">
            @csrf
            <div class="divAjoutCellier">
                <label  for="nom">Nom du cellier</label>
                <input type="text" name="nom" id="nom" maxlength="50" placeholder="Entrez le nom du cellier">
                @error('nom')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button class="btnRouge" type="submit">Ajouter</button>
        </form>
    </section>
</x-app-layout>