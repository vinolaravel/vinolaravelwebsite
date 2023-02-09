<x-app-layout>
    <p class="titre">Editer un cellier</p>
    <section class="formAjoutCellier">
        <form action="{{ route('celliers.update', $cellier->id) }}" method="post">
            @csrf
            @method('PUT')
            
            <div class="divAjoutCellier">
                <label for="nom">Nom du cellier</label>
                <input type="text" name="nom" id="nom" maxlength="50" placeholder="{{old('nom', $cellier->nom)}}">
                @error('nom')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btnVert">Modifier</button>
        </form>
    </section>
</x-app-layout>