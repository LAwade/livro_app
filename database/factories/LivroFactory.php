<?php

namespace Database\Factories;

use App\Models\Assunto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Livro>
 */
class LivroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => fake()->sentence(3),
            'data_publicacao' => fake()->date(),
            'valor' => fake()->randomFloat(2, 10, 100),
            'assunto_id' => Assunto::inRandomOrder()->first()->id ?? Assunto::factory(),
        ];
    }
}
