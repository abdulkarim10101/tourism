<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $fillable = [
        'user_id',
        'brand_name',
        'email',
        'status',
        'phone',
        'mobile',
        'status',
        'active',
        'address',
        'image',
        'website_url',
        'bank_name',
        'bank_account_holder',
        'bank_account_number',
    ];
}
