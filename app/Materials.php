<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materials extends Model
{
    protected $fillable = [
        'product_id','url',
    ];
    public $timestamps = true;
}
