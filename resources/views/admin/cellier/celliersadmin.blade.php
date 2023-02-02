<x-app-layout>
    @if ($celliers->count() > 0)
    <table>
        <tr>
            <th>Nom</th>
            <th>Nom d'utilisateur</th>
            <th>Courriel</th>
            <th>Date d'inscription</th>
            <th>Nombre de bouteilles</th>
            <th>Actions</th>
        </tr>
        @foreach ($celliers as $cellier)
            <tr>
                <td>{{ $cellier->nom }}</td>
                <td>{{ $cellier->user->name }}</td>
                <td>{{ $cellier->user->email }}</td>
                <td>{{ $cellier->user->created_at }}</td>
                <td>{{ $cellier->bouteilles->count() }}</td>
                <td>
                    <form action="{{ route('admin.cellierDelete', [$user->id, $cellier->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="supprimer cellier">
                    </form>
                    <a href="{{ route('admin.editCellier', [$user->id, $cellier->id]) }}">
                        <button class="myButton">Modifier</button>
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
