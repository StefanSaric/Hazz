<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'name','text', 'amount','description','key'
    ];
    public $timestamps = true;


    public function materials()
    {
        return $this->hasMany('App\Materials','product_id','id');
    }

    public function sizes()
    {
        return $this->hasMany('App\Sizes','product_id','id');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Categories','product_categories','product_id','category_id');
    }

    public function hasCategory($categoryName)
    {
        foreach ($this->categories()->get() as $category)
        {
            if ($category->name == $categoryName)
            {
                return true;
            }
        }
        return false;
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tags','product_tags','product_id','tag_id');
    }
}
