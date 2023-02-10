<x-app-layout>
    <div class="introPage">
        <h1>Liste des celliers de <span>{{$celliers[0]->user->name}}</span></h1>
    </div>
    @if ($celliers->count() > 0)
    <table id="example" class="table table-striped" style="width:100%">
        <tr>
            <th>Nom</th>
            <th>Courriel</th>
            <th>Date de création</th>
            <th>Nombre de bouteilles</th>
            <th>Actions</th>
        </tr>
        @foreach ($celliers as $cellier)
            <tr>
                <td>{{ $cellier->nom }}</td>
                <td>{{ $cellier->user->email }}</td>
                <td>{{ $cellier->user->created_at->format('d-m-Y') }}</td>
                <td>{{ $cellier->bouteilles->count() }}</td>
                <td class="tdAction">
                    <a href="{{ route('admin.voirContenuCellier', [$cellier->user->id, $cellier->id]) }}">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                    
                    <form action="{{ route('admin.cellierDelete', [$cellier->user->id, $cellier->id]) }}" method="post">
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
            Aucun cellier disponible
        </div>
    @endif
    <div class="optionsPage">
        <a class="linkPage" href="{{ route('admin.users') }}">Retour à la page des utilisateurs</a>
        <a class="linkPage" href="{{ route('admin') }}">Retour à la page d'accueil</a>
        {{  $celliers->links()  }}
    </div>
</x-app-layout>
