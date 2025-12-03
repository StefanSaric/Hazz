<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'name', 'text', 'amount', 'description', 'key',
    ];

    public $timestamps = true;

    public function materials()
    {
        return $this->hasMany('App\Models\Materials', 'product_id', 'id')->orderBy('ordernumber', 'asc');
    }

    public function sizes()
    {
        return $this->hasMany('App\Models\Sizes', 'product_id', 'id')->orderBy('sizes.id');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Categories', 'product_categories', 'product_id', 'category_id');
    }

    public function hasCategory($categoryName)
    {
        foreach ($this->categories()->get() as $category) {
            if ($category->name == $categoryName) {
                return true;
            }
        }

        return false;
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tags', 'product_tags', 'product_id', 'tag_id');
    }
}
