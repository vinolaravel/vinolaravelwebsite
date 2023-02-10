<x-app-layout>
    <div class="introPage">
        <h1>Liste des utilisateurs</h1>
        <h4>Nombre des utilisateurs inscrits: <span>{{$users->count()}}</span></h4>
    </div>
    @if ($users->count() > 0)
    <table id="example" class="table table-striped" style="width:100%">
        <tr>
            <th>Nom</th>
            <th>Courriel</th>
            <th class="di">Date d'inscription</th>
            <th class="nbc">Nombre de celliers</th>
            <th>Actions</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at->format('d-m-Y') }}</td>
                <td>{{ $user->celliers->count() }} </td>
                <td class="tdAction">
                    <a class="afficheBtn" href="{{ route('admin.afficheCelliers', $user->id) }}"><i class="fa-solid fa-eye"></i></a>
                    <form  action="{{ route('admin.userDelete', $user->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="supprBtn" type="submit"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    @else
        <div class="messageAucun">
            Aucun utilisateur disponible
        </div>
    @endif
    <div class="optionsPage">
        <a class="linkPage" href="{{ route('admin') }}">Retour à la page d'accueil</a>
        {{  $users->links()  }}
    </div>
</x-app-layout>


{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    if (window.innerWidth < 520) {
        document.querySelector('.di').remove();
        document.querySelector('.nbc').remove();
        let table = document.getElementById('example');
        let rows = table.getElementsByTagName('tr');

        for (let i = 0; i < rows.length; i++) {
            let cells = rows[i].getElementsByTagName('td');
            for (let j = 0; j < cells.length; j++) {
                if (j == 2 || j == 3) {
                    cells[j].style.display = 'none';
                }
            }
        }
    } else {
        $(document).ready(function() {
            $('#example').DataTable();
        });
    }
</script>
