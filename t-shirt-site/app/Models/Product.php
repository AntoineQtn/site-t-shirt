<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['name', 'description', 'image', 'brand', 'available', 'quantity', 'price'];

    public static function findOrFail(int $id)
    {
        return static::where('id', $id)->firstOrFail();
    }
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function isInCartFor($userId)
    {
        return $this->cartItems()->where('user_id', $userId)->exists();
    }

    public function getCartQuantityFor($userId)
    {
        $cartItem = $this->cartItems()->where('user_id', $userId)->first();
        return $cartItem ? $cartItem->quantity : 0;
    }
}
