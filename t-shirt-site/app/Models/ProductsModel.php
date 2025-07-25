<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductsModel extends Model
{
    protected $table = 'products';

    // CORRIGÉ : 'available' au lieu de 'avalaible'
    protected $fillable = ['name', 'description', 'image', 'brand', 'available', 'quantity', 'price'];

    // CORRIGÉ : Méthode findOrFail implémentée
    public static function findOrFail(int $id)
    {
        return static::where('id', $id)->firstOrFail();
    }
}
