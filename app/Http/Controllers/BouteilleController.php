<?php

namespace App\Http\Controllers;

use Goutte\Client;
use App\Models\Type;
// use Illuminate\Support\Facades\Http;
use App\Models\Bouteille;
use Illuminate\Http\Request;


class BouteilleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bouteilles = Bouteille::all();
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

        return view('bouteilles', compact('bouteilles'));
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
        //
    }
}
