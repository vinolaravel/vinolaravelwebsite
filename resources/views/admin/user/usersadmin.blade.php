<x-app-layout>
    <div class="introPage">
        <h1>Liste des utilisateurs</h1>
        <h4>Nombre des utilisateurs inscrits: <span>{{$users->count()}}</span></h4>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mb-2 mr-sm-2" type="search" placeholder="Rechercher..." aria-label="Search" id="searchTerm">
            <button class="btn btn-outline-danger my-2 my-sm-0" type="submit" id="searchBtn">Rechercher</button>
        </form>
    </div>
    @if ($users->count() > 0)
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Courriel</th>
                <th class="di">Date d'inscription</th>
                <th class="nbc">Nombre de celliers</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="tableData">
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
        </tbody>
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
<script>
    document.getElementById("searchBtn").addEventListener("click", function(event){
        event.preventDefault();
        let searchTerm = document.getElementById("searchTerm").value.toLowerCase();
        let tableData = document.getElementById("tableData");
        let rows = tableData.getElementsByTagName("tr");
        for (let i = 0; i < rows.length; i++) {
            let firstCol = rows[i].getElementsByTagName("td")[0];
            let secondCol = rows[i].getElementsByTagName("td")[1];
            if (firstCol || secondCol) {
                if (firstCol.innerHTML.toLowerCase().indexOf(searchTerm) > -1 || secondCol.innerHTML.toLowerCase().indexOf(searchTerm) > -1) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        }
    });
</script>