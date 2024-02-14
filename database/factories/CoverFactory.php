<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cover>
 */
class CoverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $books = Book::all();
        return [
            'alto' => fake()->numberBetween(1,100),
            'ancho' => fake()->numberBetween(1,100),
            'ruta_img' => fake()->word(),
            'extension_img' => fake()->randomElement(['png', 'svg', 'jpg', 'gif']),
            'book_id' => fake()->unique()->numberBetween(1,$books->count())
        ];
    }
}
