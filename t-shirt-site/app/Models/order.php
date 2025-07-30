<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'total_price',
        'status', // par exemple : en attente, livré, annulé...
        'address', // si applicable
        // ajoute ici tous les champs que ta table `orders` contient
    ];
}