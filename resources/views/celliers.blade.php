@extends('layouts.app')

@section('contenu')

{{-- <section class="containerCatalogue">
    @foreach ($celliers as $cellier)
        <div class="carteCatalogue" data-quantite="">
            <div>
                <img src="https:{{$cellier->image}}">
                <p class="nom">Nom : {{$cellier->nom}}</p>
                <p class="quantite">Quantité : {{$cellier->quantite}}</p>
                <p class="pays">Pays : {{$cellier->pays}}</p>
                <p class="type">Type : {{$cellier->type}}</p>
                <p class="millesime">Millesime : {{$cellier->millesime}}</p>
                <p><a href="{{$cellier->url_saq}}">Voir SAQ</a></p>
                <article class="options" data-id="{{$cellier->id_bouteille_cellier}}">
                    <button name="btnAjouter" class="btnAjouter">Ajouter</button>
                    <button name="btnModifier" class="btnModifier">Modifier</button>
                    <button name="btnBoire" class="btnBoire">Boire</button>
                </article>
            </div>
        </div>
    @endforeach
</section> --}}




{{-- {{ $celliers}} --}}

@foreach ($celliers as $cellier)
    <li>{{ $cellier->millesime }}</li>
@endforeach

<a href="{{ route('bouteilles.index') }}">go to bouteilles</a>




@endsection



