<x-app-layout>
    <form action="{{ route('celliers.store', auth()->user()->id) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="nom">Nom du cellier</label>
            <input type="text" class="form-control" name="nom" id="nom" placeholder="Entrez le nom du cellier">
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</x-app-layout>