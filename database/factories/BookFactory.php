<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => fake()->dni(),
            'autor' => fake()->firstName(),
            'fechapub' => fake()->dateTimeBetween('-100 year', 'now'),
            'genero' => fake()->randomElement(['Novela', 'Ficcion']),
            'numeroPaguinas' => fake()->numberBetween(1, 3000)
        ];
    }
}
