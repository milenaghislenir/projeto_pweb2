<?php

namespace Database\Factories;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categories>
 */
class CategoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Categories::class;
    public function getGenre():array{
        $default_genre=['Comédia','Romance','SciFi','Terror','Drama'];
        $new_genres=[];
        for ($i=0; $i < 100; $i++) {
            $value=array_rand($default_genre,1);
        array_push($new_genres,"{$value}"."{$i}");
        }
        return $new_genres;
    }
    public function definition(): array
    {
        return [
            'genre' => $this->faker->unique()->word(),
            'description' => $this->faker->unique()->text(),
            'popularity' => $this->faker->numberBetween(0,100),
        ];
    }
}
