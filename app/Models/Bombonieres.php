<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bombonieres extends Model
{
    use HasFactory;

    protected $table = "bombonieres"; //nome da tabela
    protected $fillable = [
        "candy",
        "drink",
        "salty"
    ];
}
