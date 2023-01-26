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

        DB::table('types')->insert([
            [
                'type' => 'Vin blanc'
            ],
            [
                'type' => 'Vin rouge'
            ]
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('types');
    }
};
