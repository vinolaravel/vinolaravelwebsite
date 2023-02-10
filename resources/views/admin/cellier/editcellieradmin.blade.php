<x-app-layout>
    <section class="form">
        <h5 class="form-title">Editer un cellier</h5><br>
        <form action="{{ route('admin.updateCellier', [$user->id, $cellier->id]) }}" method="post">
            @csrf
            @method('PUT')
            <div>
                <label for="nom">Nom du cellier</label>
                <input type="text" name="nom" id="nom" placeholder="{{old('nom', $cellier->nom)}}">
            </div>

            <button type="submit" class="">Appliquer</button>
        </form>
    </section>
</x-app-layout>