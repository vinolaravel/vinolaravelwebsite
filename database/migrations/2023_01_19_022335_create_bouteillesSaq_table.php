<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // creation de la table bouteilles
    public function up()
    {
        Schema::create('bouteillesSaq', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 200);
            $table->string('image', 200);
            $table->string('code_saq', 50);
            $table->string('pays', 50);
            $table->string('description', 200);
            $table->float('prix_saq', 8, 2);
            $table->string('url_saq', 200);
            $table->string('url_image', 200);
            $table->string('format', 20);
            $table->unsignedBigInteger('type_id');
            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('bouteilles');
    }
};
