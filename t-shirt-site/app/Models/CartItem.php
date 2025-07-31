<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'price'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'quantity' => 'integer'
    ];

    //méthode qui établi une relation "many-to-one" entre les cartItems et l'user, littéralement ils appartiennent à un user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //De la même manière les cartItems appartiennent nécessairement à la classe product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getTotalAttribute()
    {
        return $this->price * $this->quantity;
    }

    public function updateQuantity($quantity)
    {
        $this->quantity = max(1, $quantity);
        $this->save();
    }
}
