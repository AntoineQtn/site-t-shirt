<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    protected $fillable = ['name', 'description', 'image', 'marque', 'disponibilite', 'quantite', 'price', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
