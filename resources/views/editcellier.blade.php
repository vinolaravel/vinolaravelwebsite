<x-app-layout>
    <form action="{{ route('celliers.update', $cellier->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Nom du cellier</label>
            <input type="text" class="form-control" name="nom" id="nom" placeholder="{{old('nom', $cellier->nom)}}">
        </div>

        <button type="submit" class="btn btn-primary">Appliquer</button>
    </form>
</x-app-layout>