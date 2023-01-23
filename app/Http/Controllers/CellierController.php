<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cellier;
use App\Models\Bouteille;
use Illuminate\Http\Request;
use App\Models\BouteilleCellier;

class CellierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $celliers = Cellier::where('user_id', auth()->user()->id)->get();

        foreach ($celliers as $cellier) {
            $cellier->nbBouteilles = BouteilleCellier::where('cellier_id', $cellier->id)->count();
        }

        return view('celliers')->with('celliers', $celliers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ajoutercellier');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required | max:255 | regex:/^((?!cellier).)*$/',
        ]);

        Cellier::create([
            'nom' => $request->nom,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('celliers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cellier = Cellier::findOrfail($id);
        // dd($cellier);
        $bouteilles = BouteilleCellier::where('cellier_id', $id)->get();
        // dd($bouteilles);
        return view('uncellier')->with('cellier', $cellier)->with('bouteilles', $bouteilles);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detailsBouteille($id)
    {
        $bouteille = BouteilleCellier::find($id);
        return view('detailsBouteille')->with('bouteille', $bouteille);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cellier = Cellier::findOrfail($id);
        return view('editcellier')->with('cellier', $cellier);
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
        $request->validate([
            'nom' => 'required | max:255 | regex:/^((?!cellier).)*$/',
        ]);

        $cellier = Cellier::findOrfail($id);
        $cellier->nom = $request->nom;
        $cellier->save();

        return redirect()->route('celliers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cellier::findOrfail($id)->delete();

        return redirect()->route('celliers');
    }
}
