<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Products;
use App\Tags;

class Product_Tags extends Model
{
    protected $fillable = [
        'product_id', 'tag_id'
    ];

    protected $table = 'Product_Tags';
}
