<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Instituto>
 */
class InstitutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cod_instituto' => fake()->dni(),
            'nombre' => fake()->firstName(),
            'localidad' => fake()->word(),
            'numeroAlumnos' => fake()->numberBetween(60, 90)
        ];
    }
}
