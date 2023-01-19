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
            $table->unsignedBigInteger('bouteille_id');
            $table->unsignedBigInteger('cellier_id');
            $table->timestamps();

            $table->foreign('bouteille_id')->references('id')->on('bouteilles')->onDelete('cascade');
            $table->foreign('cellier_id')->references('id')->on('celliers')->onDelete('cascade');
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
