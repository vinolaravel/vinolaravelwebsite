<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\Http;
use App\Models\Cellier;
use App\Models\Bouteille;
use App\Models\BouteilleSaq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BouteilleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bouteilles = Bouteille::all();
        return view('bouteilles', compact('bouteilles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addBouteille(Request $request, $id)
    {
        $bouteille = Bouteille::findOrfail($request->idBouteille);
        $bouteille->quantite = $bouteille->quantite + 1;
        $bouteille->save();
        return redirect()->route('celliers.show', $id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function drinkBouteille(Request $request, $id)
    {
        $bouteille = Bouteille::findOrfail($request->idBouteille);
        $bouteille->quantite = $bouteille->quantite - 1;
        $bouteille->save();

        if ($bouteille->quantite == 0) {
            $bouteille->delete();
        }

        return redirect()->route('celliers.show', $id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
        $bouteilles = BouteilleSaq::all();
        $cellier = Cellier::where('id', $id)->first();
        return view('ajouterbouteille')->with('cellier', $cellier)->with('bouteilles', $bouteilles);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (isset($request->pays)) {
            $image = $request->file('image');
            $fileName = $image->getClientOriginalName();
            $image->move(public_path('images'), $image->getClientOriginalName());

            $request->validate([
                'nom' => 'required | max:100',
                // 'image' => 'required | image | mimes:jpeg,jpg,png | max:1000',
                'pays' => 'required | max:50',
                'date_achat' => 'required',
                'prix_achat' => 'required | numeric | min:0',
                'type_id' => 'required',
                'quantite' => 'required | numeric',
                'millesime' => 'required',
                'garde_jusqua' => 'required',
                'format' => 'required', // | regex:/^[0-9]{2,4}$/
                'description' => 'required | max:200'
            ]);


            Bouteille::create([
                'cellier_id' => $request->id,
                'nom' => $request->nom,
                'image' => $fileName,
                'pays' => $request->pays,
                'date_achat' => $request->date_achat,
                'prix_achat' => $request->prix_achat,
                'type_id' => $request->type_id,
                'quantite' => $request->quantite,
                'millesime' => $request->millesime,
                'garde_jusqua' => $request->garde_jusqua,
                'format' => $request->format,
                'description' => $request->description,
            ]);

            return redirect()->route('celliers.show', $request->id);
        } else {
            $bouteilleSAQ = BouteilleSaq::where('nom', $request->nom)->first();

            $request->validate([
                'nom' => 'required',
                'prix_achat' => 'required|numeric',
                'millesime' => 'required|numeric',
                'quantite' => 'required|numeric'
            ]);

            $bouteilleUSER = Bouteille::create(
                [
                    'cellier_id' => $request->id,
                    'nom' => $bouteilleSAQ->nom,
                    'image' => $bouteilleSAQ->image,
                    'pays' => $bouteilleSAQ->pays,
                    'prix_achat' => $request->prix_achat,
                    'millesime' => $request->millesime,
                    'date_achat' => $request->date_achat,
                    'garde_jusqua' => $request->garde_jusqua,
                    'quantite' => $request->quantite,
                    'description' => $bouteilleSAQ->description,
                    'format' => $bouteilleSAQ->format,
                    'type_id' => $bouteilleSAQ->type_id
                ]
            );

            return redirect()->route('celliers.show', $request->id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $bouteille = Bouteille::findOrFail($request->idBouteille);
        $cellier = Cellier::where('id', $id)->first();
        return view('editbouteille')->with('bouteille', $bouteille)->with('cellier', $cellier);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bouteille = Bouteille::findOrfail($request->idBouteille)->first();
        // dd($bouteille);
        $request->validate([
            'nom' => 'required',
            'pays' => 'required',
            'prix_achat' => 'required|numeric',
            'date_achat' => 'required|date',
            'garde_jusqua' => 'required|date',
            'millesime' => 'required|numeric',
            'quantite' => 'required|numeric',
            'description' => 'required',
            'format' => 'required',
        ]);

        $bouteille->update($request->all());

        return redirect()->route('celliers.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Bouteille::where('id', $request->idBouteille)->delete();
        return redirect()->route('celliers.show', $id);
    }
}
