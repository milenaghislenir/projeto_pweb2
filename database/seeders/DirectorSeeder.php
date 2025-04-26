<?php

namespace Database\Seeders;

use App\Models\Directors;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DirectorSeeder extends Seeder
{

    public function run(): void
    {
        Directors::factory()->count(5)->create(); //chama 5x a factory pra criar registros no banco (5 diretores)
    }
}
