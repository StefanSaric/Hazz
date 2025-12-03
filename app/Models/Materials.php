<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materials extends Model
{
    protected $fillable = [
        'product_id', 'order_number', 'url',
    ];

    public $timestamps = true;
}
