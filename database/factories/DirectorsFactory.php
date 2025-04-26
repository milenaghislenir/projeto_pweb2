<?php

namespace Database\Factories;

use App\Models\Directors;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Directors>
 */
class DirectorsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Directors::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->name(), //this acessa a classe faker da factory e a função name que retorna nome falso
            'age' => $this->faker->numberBetween(1,120),
            'country' => $this->faker->country(),
            'num_productions' => $this->faker->randomNumber(),
        ];
    }
}
