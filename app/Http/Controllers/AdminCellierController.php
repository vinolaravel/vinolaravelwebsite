<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cellier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminCellierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('admin')) {
            abort(403);
        }
        $celliers = Cellier::all();

        return view('admin.cellier.celliersadmin', compact('celliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $idUser)
    {
        if (!Gate::allows('admin')) {
            abort(403);
        }
        $user = User::find($idUser);
        $celliers = $user->celliers;
        return view('admin.cellier.celliersadmin', compact('celliers', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $idUser, $idCellier)
    {
        if (!Gate::allows('admin')) {
            abort(403);
        }
        $user = User::find($idUser);
        $cellier = $user->celliers->find($idCellier);
        return view('admin.cellier.editcellieradmin', compact('cellier', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idCellier, $idUser)
    {
        if (!Gate::allows('admin')) {
            abort(403);
        }
        $user = User::find($idUser);
        $cellier = $user->celliers->find($idCellier);
        $cellier->nom = $request->nom;
        $cellier->save();
        return redirect()->route('admin.afficheCelliers', ['idUser' => $idUser]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $idUser, $idCellier)
    {
        if (!Gate::allows('admin')) {
            abort(403);
        }
        $user = User::find($idUser);
        $cellier = $user->celliers->find($idCellier);
        $cellier->delete();
        return redirect()->route('admin.afficheCelliers', ['idUser' => $idUser]);
    }
}
