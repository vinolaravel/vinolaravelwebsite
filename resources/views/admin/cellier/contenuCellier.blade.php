<x-app-layout>
    <div class="detailsCellier">
        <h1>Cellier de {{ $cellier->user->name }}</h1>
        <h2>Nom du cellier: {{ $cellier->nom }}</h2>
        <h3>Nombre de bouteilles: {{ $cellier->bouteilles->count() }}</h3>
        <h3>Date de création: {{ $cellier->created_at }}</h3>
        <form action="{{ route('admin.cellierDelete', [$cellier->user->id, $cellier->id]) }}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" value="supprimer cellier">
        </form>
        <a href="{{ route('admin.editCellier', [$cellier->user->id, $cellier->id]) }}">
            <button class="myButton">Modifier</button>
        </a>
        <a href="{{ route('admin.voirContenuCellier', [$cellier->user->id, $cellier->id]) }}">
            <button class="myButton">Détails</button>
        </a>
        <table id="example" class="table table-striped" style="width:100%">
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
    </div>
    {{  $bouteilles->links()  }}
</x-app-layout>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    function deleteCellier(id) {
        if (confirm('Voulez-vous vraiment supprimer ce cellier?')) {
            document.getElementById('delete-form-' + id).submit();
        }
    }

    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
