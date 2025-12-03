<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_Categories extends Model
{
    protected $fillable = [
        'product_id', 'category_id',
    ];

    protected $table = 'product_categories';
}
