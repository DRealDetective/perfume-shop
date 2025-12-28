<?php

use App\Models\Order;

class Product extends Model
{
    protected $fillable = ['name', 'price'];

    public function orders()
    {
        return $this->belongsToMany(Order::class)
                    ->withPivot('quantity')
                    ->withTimestamps();
    }
}
