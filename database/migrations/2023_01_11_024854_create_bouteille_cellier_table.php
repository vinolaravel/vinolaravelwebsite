<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bouteille_cellier', function (Blueprint $table) {
            
            $table->id();
            $table->integer('id_bouteille');
            $table->date('date_achat');
            $table->string('garde_jusqua', 200);
            $table->string('notes', 200);
            $table->float('prix', 8, 2);
            $table->integer('quantite');
            $table->integer('millesime');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bouteille_cellier');
    }
};
