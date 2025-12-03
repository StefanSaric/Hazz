<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Tags extends Model
{
    protected $fillable = [
        'product_id', 'tag_id',
    ];

    protected $table = 'product_tags';
}
