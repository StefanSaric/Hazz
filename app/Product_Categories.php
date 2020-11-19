<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Products;
use App\Categories;

class Product_Categories extends Model
{
    protected $fillable = [
        'product_id', 'category_id'
    ];

    protected $table="Product_Categories";
}
