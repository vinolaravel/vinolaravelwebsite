<?php

namespace App\Http\Controllers;

use App\Models\BouteilleSaq;
use Illuminate\Http\Request;

class ChercheBouteilleController extends Controller
{
    public function search(Request $request)
    {
        $nom = $request->input('nom');
        $bouteilles = BouteilleSaq::where('nom', 'like', '%' . $nom . '%')->get();
        return response()->json($bouteilles);
    }
}
