<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->date('date_achat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->date('garde_jusqua');
            $table->year('millesime');
            $table->integer('quantite');
            $table->string('description', 200);
            $table->string('format', 20);
            $table->unsignedBigInteger('type_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('bouteille_id')->references('id')->on('bouteilles');
            $table->foreign('cellier_id')->references('id')->on('celliers')->onDelete('cascade');
            $table->foreign('type_id')->references('type_id')->on('bouteilles')->onDelete('cascade');
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
