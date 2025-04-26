<?php

namespace Database\Factories;

use App\Models\Employees;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employees>
 */
class EmployeesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */protected $model = \App\Models\Employees::class;

    public function definition(): array
    {
        return [

                'name' => $this->faker->unique()->name(),
                'age' => $this->faker->numberBetween(1,120),
                'position' => $this->faker->randomElement(['Suporte TI','Bilheteria','Marketing','Gestão','Operacional']),
                'salary' => $this->faker->randomNumber(),

        ];
    }
}
