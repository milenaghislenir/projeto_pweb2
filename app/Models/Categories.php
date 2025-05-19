<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Movies; // Import the Movies class

class Categories extends Model
{
    use HasFactory;

    protected $table = "categories"; //nome da tabela
    protected $fillable = [
        "genre",
        "description",
        "popularity"
    ];
    public function movies()
    {
        return $this->hasMany(Movies::class, 'category_id');
    }
}
