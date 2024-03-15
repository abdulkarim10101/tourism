<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
            'sku',
            'user_id',
            'address',
            'order_total',
            'total',
            'status',
            'delivery_fee',
            'extra_comments',
            'method',
            'paid',
            'order_notes',
            'promocode_id',
            'discount_percentage'
    ];

    public function order_details()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');

    }

    public function promo(){
        return $this->belongsTo(PromoCode::class, 'promocode_id');

    }
}
