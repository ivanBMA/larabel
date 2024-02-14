<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Copy>
 */
class CopyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'numero_edicion' => fake()->numberBetween(1,99),
            'editorial' => fake()->word(),
            'fecha_edicion' => fake()->dateTimeBetween('-25 year', 'now')
        ];
    }
}
