<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materials extends Model
{
    protected $fillable = [
        'product_id', 'ordernumber', 'url',
    ];

    public $timestamps = true;
}
