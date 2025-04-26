<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder  extends Seeder
{

    public function run(): void
    {
        Categories::factory()->count(5)->create(); //chama 5x a factory pra criar registros no banco (5 categorias)
    }
}