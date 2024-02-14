<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Partner>
 */
class PartnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dni' => fake()->dni(),
            'nombre' => fake()->firstName(),
            'apellido' => fake()->name(),
            'edad' => fake()->numberBetween(18, 99),
            'email' => fake()->email()
        ];
    }
}
