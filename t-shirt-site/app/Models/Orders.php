<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Orders extends Model
{
    protected $table = 'orders';

    protected $fillable = ['customer_id', 'order_price'];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }
}
