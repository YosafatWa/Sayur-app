<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'vegetables',
        'name_customer',
        'total_price',
    ];

    protected $casts = [
        'vegetables' => 'array',
    ];
}
