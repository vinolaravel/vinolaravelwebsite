<x-app-layout>
    @if ($users->count() > 0)
    <table id="example" class="table table-striped" style="width:100%">
        <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Nombre de celliers</th>
            <th>Actions</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->celliers->count() }} </td>
                <td>
                    <a href="{{ route('admin.afficheCelliers', $user->id) }}">Voir les celliers</a>
                    <form action="{{ route('admin.userDelete', $user->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="supprimer user">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    @else
        Aucun utilisateur disponible
    @endif
    {{  $users->links()  }}
</x-app-layout>
{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
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
