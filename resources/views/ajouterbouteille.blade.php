<x-app-layout>
    <form action="{{ route('bouteilles.store', $cellier->id) }}" method="post">
        @csrf

        <div>
            <label for="nom">Nom de la bouteille</label>
            <select name="nom" id="nom">
                @foreach ($bouteilles as $bouteille)
                    <option value="{{ $bouteille->nom }}">{{ $bouteille->nom }}</option>
                @endforeach
            </select>
            <a href="{{ route('bouteilles.create', $cellier->id) }}">Generer</a>
        </div>

        <div>
            <label for="prix_achat">Prix d'achat</label>
            <input type="number" name="prix_achat" id="prix_achat" placeholder="entrez prix">
            {{-- <input type="number" name="prix_achat" id="prix_achat" placeholder="{{old('prix_achat', $bouteilles->prix_achat)}}"> --}}
        </div>

        <div>
            <label for="date_achat">Date d'achat</label>
            <input type="date" name="date_achat" id="date_achat" placeholder="Entrez la date d'achat">
        </div>

        <div>
            <label for="millesime">Millesime</label>
            <input type="number" name="millesime" id="millesime" placeholder="Entrez le millesime">
        </div>

        <div>
            <label for="garde_jusqua">Garde jusqu'a</label>
            <input type="date" name="garde_jusqua" id="garde_jusqua" placeholder="Entrez la date de garde">
        </div>

        <div>
            <label for="quantite">Quantite</label>
            <input type="number" name="quantite" id="quantite" placeholder="Entrez la quantite">
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</x-app-layout>