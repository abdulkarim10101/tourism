<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
    // use SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'status',
        'featured',
        'parent_id',
        'image',
        'slug'
    ];

//     public function products()
// {
//     return $this->hasMany(Product::class, 'category_id');
// }
public function children() {
    return $this->hasMany(ProductCategory::class, 'parent_id');
}
public function parent() {
    return $this->belongsTo(ProductCategory::class, 'parent_id');
}

public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'product_in_categories',
            'category_id', // Foreign key on the pincategories table...
            'product_id', // Foreign key on the products table...
        );
    }

    // Add a new relationship method for limited products
    public function limitedProducts($limit = 10)
    {
        return $this->belongsToMany(Product::class, 'product_in_categories', 'category_id', 'product_id')
            ->take($limit);
    }
}
