<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'fullname',
        'phone',
        'email',
        'address',
        'total',
    ];
}
