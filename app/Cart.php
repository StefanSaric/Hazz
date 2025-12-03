<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'id', 'product_id', 'quantity', 'price', 'order_id',
    ];

    public $timestamps = true;

    public function product()
    {
        return $this->hasOne('App\Sizes', 'product_id', 'product_id');
    }
}
