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
            //'title' => $this->faker->randomElements(['Jogos Vorazes', 'Harry Potter', 'Nerve', 'Ponyo', 'Que Horas Ela Volta'],1,false),
            'title' => $this->faker->unique()->words(2, true),
            'year' => $this->faker->year(),
            'category_id' => Categories::factory(),
            'tomatoes' => $this->faker->numberBetween(0,100),
            'director_id' => Directors::factory(), // instancia diretor para o filme, (instancia o filme e o diretor pq se criar só na factory do diretor não necessariamente cria o filme)

        ];
    }
}
