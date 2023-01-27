<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'product_id',
        'numberOfUnits',
        'price',
        'discount',
    ];

    protected $casts = [
        'product_id' => 'array',
        'numberOfUnits' => 'array',
        'price' => 'array',
        'name' => 'array',
        'discount' => 'array',
    ];
}
