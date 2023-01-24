<x-app-layout>
    <section class="form">
        <h5 class="form-title">Ajouter une bouteille</h5><br>
        <form action="{{ route('bouteilles.store', $cellier->id) }}" method="post">
            @csrf

            <label for="nom"></label>
            <select name="nom" id="nom">
                @foreach ($bouteilles as $bouteille)
                <option value="{{ $bouteille->nom }}">{{ $bouteille->nom }}</option>
                @endforeach
            </select>
            <a href="{{ route('bouteilles.create', $cellier->id) }}">Generer</a>
            
            <label for="prix_achat">Prix d'achat</label>
            <input type="number" name="prix_achat" id="prix_achat" placeholder="entrez prix">
            {{-- <input type="number" name="prix_achat" id="prix_achat" placeholder="{{old('prix_achat', $bouteilles->prix_achat)}}"> --}}
            
            <label for="date_achat">Date d'achat</label>
            <input type="date" name="date_achat" id="date_achat" placeholder="Entrez la date d'achat">
            
            <label for="millesime">Millesime</label>
            <input type="number" name="millesime" id="millesime" placeholder="Entrez le millesime">

            <label for="garde_jusqua">Garde jusqu'a</label>
            <input type="date" name="garde_jusqua" id="garde_jusqua" placeholder="Entrez la date de garde">

            <label for="quantite">Quantite</label>
            <input type="number" name="quantite" id="quantite" placeholder="Entrez la quantite">

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>

    </section>
</x-app-layout>