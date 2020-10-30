<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Products;

class Tags extends Model
{
    protected $fillable = [
        'name',
    ];
    public $timestamps = true;


    public function products()
    {
        return $this->belongsToMany('App\Products','productTags');
    }
}
