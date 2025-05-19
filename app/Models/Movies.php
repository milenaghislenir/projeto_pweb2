<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    use HasFactory;

    protected $table = "movies"; //nome da tabela
    protected $fillable = [
        "title",
        "director_id",//id pra relacionar com a tabela de director (chave estrangeira)
        "year",
        "category_id",//id pra relacionar com a tabela de categories (chave estrangeira)
        "tomatoes", //campos da tabela
        "image" //campos da tabela
    ];
    

}
