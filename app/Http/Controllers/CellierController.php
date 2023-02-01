<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cellier;
use App\Models\Bouteille;
use Illuminate\Http\Request;

class CellierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(auth()->user()->id);
        $celliers = Cellier::where('user_id', auth()->user()->id)->get();

        if ($user->role_id == 1) {
            return redirect('/admin');
        }

        foreach ($celliers as $cellier) {
            $cellier->nbBouteilles = Bouteille::where('cellier_id', $cellier->id)->sum('quantite');
        }

        return view('guest.cellier.celliers')->with('celliers', $celliers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guest.cellier.ajoutercellier');
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
        $bouteilles = Bouteille::where('cellier_id', $id)->get();
        // dd($bouteilles);
        return view('guest.cellier.uncellier')->with('cellier', $cellier)->with('bouteilles', $bouteilles);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detailsBouteille($id)
    {
        $bouteille = Bouteille::find($id);
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
        return view('guest.cellier.editcellier')->with('cellier', $cellier);
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
