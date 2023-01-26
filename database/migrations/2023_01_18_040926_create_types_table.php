<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        // creation de la table types
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('type', 50);
            $table->timestamps();
        });


        // j'ai mis le code en commentaire pour ne pas avoir de doublons dans la table puisque les types de vin sont mis dans la table dès l'importation des bouteilles de la SAQ

        // ne pas mettre pour éviter les doublons
        /* DB::table('types')->insert([
            [
                'type' => 'Vin blanc'
            ],
            [
                'type' => 'Vin rouge'
            ]
        ]); */
    }

    public function down()
    {
        Schema::dropIfExists('types');
    }
};
