<x-app-layout>
    <section class="form">
        <h5 class="form-title">Editer un cellier</h5><br>
        <form action="{{ route('celliers.update', $cellier->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nom">Nom du cellier</label>
                <input type="text" name="nom" id="nom" placeholder="{{old('nom', $cellier->nom)}}">
            </div>

            <button type="submit" class="btn btn-primary">Appliquer</button>
        </form>
    </section>
</x-app-layout>