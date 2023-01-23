<?php

namespace App\Http\Controllers;

use Goutte\Client;
use App\Models\Type;
// use Illuminate\Support\Facades\Http;
use App\Models\Cellier;
use App\Models\Bouteille;
use Illuminate\Http\Request;
use App\Models\BouteilleCellier;


class BouteilleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bouteilles = BouteilleCellier::all();
        return view('bouteilles', compact('bouteilles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateSAQ(Client $client, $nombre = 24, $page = 1, $type = 'blanc')
    {
        $crawler = $client->request('GET', "https://www.saq.com/fr/produits/vin/vin-" . $type . "?p=" . $page . "&product_list_limit=" . $nombre . "&product_list_order=name_asc")->filter('.product-item')->each(function ($node) {
            $type = Type::firstOrCreate(['type' => trim(explode("|", $node->filter('.product-item-identity-format span')->text())[0]) == "Vin rouge" ? "Rouge" : "Blanc"]);
            return [
                'nom' => $node->filter('.product-item-link')->text(),
                'image' => $node->filter('.product-image-photo')->attr('src'),
                "code_saq" => $node->filter('.saq-code span')->eq(1)->text(),
                "pays" => trim(explode("|", $node->filter('.product-item-identity-format span')->text())[2]),
                "description" => $node->filter('.product-item-identity-format span')->text(),
                'prix_saq' => floatval(preg_replace('/,/', '.', $node->filter('.price')->text())),
                'url_saq' => $node->filter('.product-item-link')->attr('href'),
                'url_image' => $node->filter('.product-image-photo')->attr('src'),
                'format' => trim(explode("|", $node->filter('.product-item-identity-format span')->text())[1]),
                'type_id' => $type->id
            ];
        });

        $bouteilles = collect($crawler);

        foreach ($bouteilles as $bouteille) {
            Bouteille::create($bouteille);
        }

        return redirect('celliers');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addBouteille(Request $request, $id)
    {
        $bouteille = BouteilleCellier::findOrfail($request->idBouteille);
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
        $bouteille = BouteilleCellier::findOrfail($request->idBouteille);
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
        $bouteilles = Bouteille::all();
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
        // dd($request->nom);
        $bouteilleSAQ = Bouteille::where('nom', $request->nom)->first();

        $request->validate([
            'nom' => 'required',
            'prix_achat' => 'required|numeric',
            'millesime' => 'required|numeric',
            'quantite' => 'required|numeric'
        ]);

        $bouteilleUSER = BouteilleCellier::updateOrCreate(
            [
                'bouteille_id' => $bouteilleSAQ->id,
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BouteilleCellier::where('id', $id)->delete();
        return redirect()->route('celliers.show', $id);
    }
}
