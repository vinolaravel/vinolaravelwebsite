<?php

namespace Database\Seeders;

use App\Models\Cellier;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CellierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cellier::factory()->count(10)->create();
    }
}
