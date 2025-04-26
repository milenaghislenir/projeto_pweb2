<?php

namespace Database\Seeders;

use App\Models\Movies;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MoviesSeeder extends Seeder
{

    public function run(): void
    {
        Movies::factory()->count(5)->create(); //chama 5x a factory pra criar registros no banco (5 filmes)
    }
}
