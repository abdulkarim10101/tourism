<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariationCategory extends Model
{
    protected $fillable = [
        'id',
        'name',
        'product_id',
        'type',
        'status',
        'featured',
        'parent_id',
    ];

    public function variations()
{
    return $this->hasMany(ProductVariation::class, 'category_id');
}
}
