<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bouteille>
 */
class BouteilleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->name,
            'image' => $this->faker->imageUrl,
            'code_saq' => $this->faker->numberBetween(1, 1000000),
            'pays' => $this->faker->country,
            'description' => fake()->realText(100),
            'prix_saq' => $this->faker->randomFloat(2, 0, 100),
            'url_saq' => $this->faker->url,
            'url_image' => $this->faker->imageUrl,
            'format' => $this->faker->numberBetween(1, 10),
            'type' => $this->faker->numberBetween(1, 2),
        ];
    }
}
