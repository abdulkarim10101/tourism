<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;


class Product extends Model
{
    // use SoftDeletes;

    protected $fillable = [
        'name',
        'status',
        'featured',
        'price',
        'special_price',
        'special_price_from',
        'special_price_to',
        'priority',
        'type',
        'category_id',
        'qty',
        'in_stock',
        'buying_price',
        'description',
        'slug',
        'video',
        'sku',
        'short_description',
        "mpn",
        "brand_name",
        "name",
        "short_description",
        "description",
        "meta_description",
        "meta_title",
        "weight",
        "condition",
        "quantity",
        "stock",
        "gfeed_category",
        "upc",
        "status",
        "url",
        "image_url",
        "google_feed",

    ];



    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id')->orderBy('sort_order');
    }
    public function variation_categories()
    {
        return $this->hasMany(ProductVariationCategory::class, 'product_id');
    }
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function addedToWishlist()
    {
        $check=null;
        if(auth()->check()){

            $check = Wishlist::where('user_id', auth()->user()->id)->where('product_id', $this->id)->first();
            if ($check != null) {
                $check = true;
            } else {
                $check = false;
            }
        }
            return $check;
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id');
    }

    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class, 'product_in_categories', 'product_id', 'category_id');
    }
}
