<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'id','total','first_name','last_name','email','phone','city','address','num_of_house', 'num_of_apartment','note','status'
    ];
    public $timestamps = true;

    public function cart()
    {
        return $this->hasMany('App\Cart','order_id','id');
    }

}
