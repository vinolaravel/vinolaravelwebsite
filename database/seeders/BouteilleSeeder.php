<?php

namespace Database\Seeders;

use App\Models\Bouteille;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BouteilleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bouteille::factory()->count(10)->create();
    }
}
