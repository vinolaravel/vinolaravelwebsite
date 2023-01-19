<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cellier>
 */
class CellierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_bouteille' => $this->faker->numberBetween(1, 10),
            'date_achat' => $this->faker->date,
            'garde_jusqua' => $this->faker->date,
            'notes' => $this->faker->numberBetween(1, 5),
            'prix' => $this->faker->randomFloat(2, 0, 100),
            'quantite' => $this->faker->numberBetween(1, 100),
            'millesime' => $this->faker->year,
            'user_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
