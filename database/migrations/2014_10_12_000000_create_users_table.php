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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 100);
            $table->string('ville', 50);
            $table->string('province', 50)->nullable();
            $table->string('pays', 50);
            $table->date('ddn');
            $table->string('courriel')->unique();
            $table->string('password');
            // $table->rememberToken();
            $table->enum('privilege', ['Membre', 'Administrateur'])->default('Membre');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
