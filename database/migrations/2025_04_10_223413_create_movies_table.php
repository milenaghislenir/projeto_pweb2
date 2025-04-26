<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string("title")->unique(); //criando na tabela uma coluna do title tipo string e unica
            $table->year("year");
            $table->unsignedBigInteger("category_id");
            $table->foreign("category_id")->references("id")->on("categories")->onDelete("cascade");
            $table->string("tomatoes"); //numero + simbolo de porcentagem (%) = string
            $table->unsignedBigInteger("director_id");
            $table->foreign("director_id")->references("id")->on("directors")->onDelete("cascade");//cascade-toda vez que deletar um director os filmes são excluídos junto
            $table->timestamps(); //coloca a hora quando cria um novo registro na tabela
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};