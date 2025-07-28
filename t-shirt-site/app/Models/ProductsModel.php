<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductsModel extends Model
{
    protected $table = 'products';

    protected $fillable = ['name', 'description', 'image', 'brand', 'available', 'quantity', 'price'];

    public static function findOrFail(int $id)
    {
        return static::where('id', $id)->firstOrFail();
    }

}
