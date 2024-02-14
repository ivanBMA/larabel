<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PacienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->firstName(),
            'apellido' => fake()->lastName(),
            'tipo_doc' => fake()->randomElement(['tipoA', 'tipoB', 'tipoC', 'tipoD']),
            'nro_doc' => fake()->numberBetween(1000, 3000),
            'fecha_nac' => fake()->dateTimeBetween('-100 year', 'now')
        ];
    }
}
