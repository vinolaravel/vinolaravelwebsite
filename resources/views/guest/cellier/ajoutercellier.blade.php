<x-app-layout>
    <section class="form">
        <h5 class="form-title">Ajouter un cellier</h5><br>
        <form action="{{ route('celliers.store', auth()->user()->id) }}" method="post">
            @csrf
            
            <div class="form-group">
                <label for="nom">Nom du cellier</label>
                <input type="text" name="nom" id="nom" maxlength="50" placeholder="Entrez le nom du cellier">
                @error('nom')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">Ajouter</button>
        </form>
    </section>
</x-app-layout>