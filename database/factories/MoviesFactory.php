<?php

namespace Database\Factories;

use App\Models\Categories;
use App\Models\Directors;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movies>
 */
class MoviesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->unique()->title(),
            'year' => $this->faker->year(),
            'category_id' => Categories::factory(),
            'tomatoes' => $this->faker->numberBetween(0,100) . '%',
            'director_id' => Directors::factory(), // instancia diretor para o filme, (instancia o filme e o diretor pq se criar só na factory do diretor não necessariamente cria o filme)

        ];
    }
}
