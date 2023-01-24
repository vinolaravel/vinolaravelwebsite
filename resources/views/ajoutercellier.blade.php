<x-app-layout>
    <section class="form">
    <h5 class="form-title">Ajouter un cellier</h5><br>
        <form action="{{ route('celliers.store', auth()->user()->id) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="nom"></label>
                <input type="text" class="form-control" name="nom" id="nom" placeholder="Entrez le nom du cellier">
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </section>
</x-app-layout>