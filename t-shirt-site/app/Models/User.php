<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Ajoutez ceci
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isUser()
    {
        return $this->role === 'user';
    }

    //Méthode définissant une relation one-to-many entre l'user (one) et les CartItems (many)
    //Pour l'user il peut avoir plusieurs produits dans son panier, pour les produits du panier ils n'ont qu'un user
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function getCartTotalAttribute()
    {
        return $this->cartItems->sum('total');
    }

    public function getCartCountAttribute()
    {
        return $this->cartItems->sum('quantity');
    }

}
