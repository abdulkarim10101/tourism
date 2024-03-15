<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table='frontend_banners';
    protected $fillable = [
        'id',
        'name',
        'type',
        'banner',
        'main_text',
        'sale_text',
        'short_description',
        'category_id'
];

public $timestamps=false;

public function category(){
    return $this->belongsTo(ProductCategory::class,'category_id');
}
}
