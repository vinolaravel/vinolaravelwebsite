<x-app-layout>
    <h1>Modifier une bouteille</h1> 
    <form action="{{ route('bouteilles.update', [$cellier->id, $bouteille->id]) }}" method="post">
        @csrf
        @method('PUT')
        
        <div>
            <img src="{{ $bouteille->image }}" alt="{{old('nom', $bouteille->nom)}}">
        </div>

        <div>
            <label for="nom">Nom de la bouteille</label>
            <input type="text" name="nom" id="nom" value="{{old('nom', $bouteille->nom)}}">
        </div>


        <div>
            <label for="pays">Pays de la bouteille</label>
            <input type="text" name="pays" id="pays" value="{{old('pays', $bouteille->pays)}}" readonly>
        </div>

        <div>
            <label for="prix_achat">Prix d'achat de la bouteille</label>
            <input type="text" class="form-control" name="prix_achat" id="prix_achat" value="{{old('prix_achat', $bouteille->prix_achat)}}">
        </div>

        <div>
            <label for="date_achat">Date d'achat de la bouteille</label>
            <input type="text" name="date_achat" id="date_achat" value="{{old('date_achat', $bouteille->date_achat)}}">
        </div>


        <div>
            <label for="garde_jusqua">Garde jusqu'a de la bouteille</label>
            <input type="text" name="garde_jusqua" id="garde_jusqua" value="{{old('garde_jusqua', $bouteille->garde_jusqua)}}">
        </div>


        <div>
            <label for="millesime">Millesime de la bouteille</label>
            <input type="text" name="millesime" id="millesime" value="{{old('millesime', $bouteille->millesime)}}">
        </div>

        <div>
            <label for="quantite">Quantite de la bouteille</label>
            <input type="text" name="quantite" id="quantite" value="{{old('quantite', $bouteille->quantite)}}">
        </div>

        <div>
            <label for="description">Description de la bouteille</label>
            <input type="text" name="description" id="description" value="{{old('description', $bouteille->description)}}">
        </div>

        <div>
            <label for="format">Format de la bouteille</label>
            <input type="text" name="format" id="format" value="{{old('format', $bouteille->format)}}" readonly>
        </div>


        <button type="submit" class="btn btn-primary">Appliquer</button>
    </form>
</x-app-layout>