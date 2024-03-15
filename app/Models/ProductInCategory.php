<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductInCategory extends Model
{
    // use SoftDeletes;

    protected $fillable=['category_id','product_id'];
    public $timestamps=false;
}
