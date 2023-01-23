<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // creation de la table bouteilles_celliers
    public function up()
    {
        Schema::create('bouteille_celliers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bouteille_id');
            $table->unsignedBigInteger('cellier_id');
            $table->string('nom', 200);
            $table->string('image', 200);
            $table->string('pays', 50);
            $table->float('prix_achat', 8, 2);
            $table->year('millesime');
            $table->integer('quantite');
            $table->string('description', 200);
            $table->string('format', 20);
            $table->unsignedBigInteger('type_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('bouteille_id')->references('id')->on('bouteilles');
            $table->foreign('cellier_id')->references('id')->on('celliers');
            $table->foreign('type_id')->references('id')->on('types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bouteille_celliers');
    }
};
