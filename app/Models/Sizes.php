<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sizes extends Model
{
    protected $fillable = [
        'product_id', 'quantity', 'unit', 'price', 'old_price', 'stock',
    ];

    public $timestamps = true;

    public function product()
    {
        return $this->hasOne('App\Models\Products', 'id', 'product_id')->where('show', 1);
    }
}
