<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    protected $fillable = [
        'id',
        'name',
        'category_id',
        'type',
        'price',
        'status',
    ];
}
