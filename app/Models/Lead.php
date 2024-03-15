<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable=[
        'name','email','phone','target_price','quantity','product_id'
    ];

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }

}
