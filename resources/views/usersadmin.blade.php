<x-app-layout>
    @if ($users->count() > 0)
    <table>
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
                    <a href="{{ route('admin.afficheCelliers', $user->id) }}">Voir celliers</a>
                    <form action="{{ route('admin.userDelete', $user->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="supprimer user">
                    </form>
                </td>

                {{-- <td>
                    <form action="{{ route('celliers.destroy', $cellier->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                </td>
                <td>
                    <a href="{{ route('celliers.edit', $cellier->id) }}">
                        <button>Modifier</button>
                    </a>
                </td>
                <td>
                    <a href="{{ route('celliers.show', $cellier->id) }}">
                        <button>Voir le contenu du cellier</button>
                    </a>
                </td> --}}
            </tr>
        @endforeach
    </table>
    @else
        Aucun utilisateur disponible
    @endif
</x-app-layout>
