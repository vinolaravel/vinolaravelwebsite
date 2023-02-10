<x-app-layout>
    <div class="introPage">
        <h1>Liste des bouteilles de <span>{{$cellier->nom}}</span></h1>
        <h4>Nombre de bouteilles <b>(par Type)</b>: <span>{{$bouteilles->count()}}</span></h4>
    </div>
    <table id="tableBouteilles" class="table table-striped" style="width:100%">
        @if ($bouteilles->count() > 0)
            <tr>
                <th>Nom</th>
                <th>Image</th>
                <th>Prix</th>
                <th>Pays</th>
                <th>Type</th>
                <th>Format</th>
                <th>Quantité</th>
            </tr>
            @foreach ($bouteilles as $bouteille)
                <tr>
                    <td>{{ $bouteille->nom }}</td>
                    <td>@if (substr($bouteille->image, 0, 8) == 'https://')
                        <img src="{{ $bouteille->image }}" alt="{{ $bouteille->nom }}" width="40px">
                    @else
                        <img src="{{ asset('images/' . $bouteille->image) }}" alt="{{ $bouteille->nom }}" width="40px">
                    @endif</td>
                    <td>{{ $bouteille->prix_achat }}$</td>
                    <td>{{ $bouteille->pays }}</td>
                    <td>Vin {{ $bouteille->type->type }}</td>
                    <td>{{ $bouteille->format }}</td>
                    <td>{{ $bouteille->quantite }}</td>
                </tr>
            @endforeach
        @else
            Aucune bouteille disponible
        @endif
    </table>
    <div class="optionsPage">
        <a class="linkPage" href="{{ route('admin.afficheCelliers', $user->id) }}">Retour à la page des celliers</a>
        <a class="linkPage" href="{{ route('admin.users') }}">Retour à la page des utilisateurs</a>
        <a class="linkPage" href="{{ route('admin') }}">Retour à la page d'accueil</a>
        {{  $bouteilles->links()  }}
    </div>
</x-app-layout>
