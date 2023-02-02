<x-app-layout>
    @if ($bouteilles->count() > 0)
    <table>
        <tr>
            <th>Nom</th>
            <th>Pays</th>
            <th>Millesime</th>
            <th>Quantité</th>
        </tr>
        @foreach ($bouteilles as $bouteille)
            <tr>
                <td>{{ $bouteille->nom }}</td>
                <td>{{ $bouteille->pays }}</td>
                <td>{{ $bouteille->millesime }}</td>
                <td>{{ $bouteille->quantite }}</td>
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
        Aucune bouteille disponible
    @endif
    {{  $bouteilles->links()  }}
</x-app-layout>
