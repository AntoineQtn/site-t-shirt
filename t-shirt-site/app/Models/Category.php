<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product; // facultatif, mais explicite

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description', // ← ajoute ceci si tu as une colonne description
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
