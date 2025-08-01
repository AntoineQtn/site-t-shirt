<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',    
        'image',          
        'category_id',    
    ];

    /**
     * Relation : un produit appartient à une catégorie.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
