<x-app-layout>
    <h1>Celliers</h1>
    @if ($celliers->count() > 0)
    <table id="example" class="table table-striped" style="width:100%">
        <tr>
            <th>Nom</th>
            <th>Nom d'utilisateur</th>
            <th>Courriel</th>
            <th>Date de création</th>
            <th>Nombre de bouteilles</th>
            <th>Actions</th>
        </tr>
        @foreach ($celliers as $cellier)
            <tr>
                <td>{{ $cellier->nom }}</td>
                <td>{{ $cellier->user->name }}</td>
                <td>{{ $cellier->user->email }}</td>
                <td>{{ $cellier->user->created_at->format('d-m-Y') }}</td>
                <td>{{ $cellier->bouteilles->count() }}</td>
                <td>
                    <form action="{{ route('admin.cellierDelete', [$cellier->user->id, $cellier->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="supprimer cellier">
                    </form>
                    {{-- <a href="{{ route('admin.editCellier', [$cellier->user->id, $cellier->id]) }}">
                        <button class="myButton">Modifier</button>
                    </a> --}}
                    <a href="{{ route('admin.voirContenuCellier', [$cellier->user->id, $cellier->id]) }}">
                        <button class="myButton">Détails</button>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
    @else
        Aucun cellier disponible 
    @endif
        {{  $celliers->links()  }}
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
