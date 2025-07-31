<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Champs autorisés à la création/modification en masse
    protected $fillable = ['name', 'description', 'image', 'marque', 'disponibilite', 'quantite', 'price', 'category_id'];

    // Relation Many-to-One : un produit appartient à une catégorie
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
