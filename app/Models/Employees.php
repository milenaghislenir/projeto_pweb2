<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;
    protected $table = "employees"; //nome da tabela
    protected $fillable = [
        "name",
        "age",
        "position",
        "salary"

    ];

}
