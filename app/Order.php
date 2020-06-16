<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps=false;
    protected $primaryKey = 'id';
    protected $fillable = [
       'name', 'address','email','contact','orders'
    ];
//    public function getProduct()
//    {   
//        return $this->hasOne('App\Product', 'id', 'product');
//    }
//     public function getCategory()
//    {   
//        return $this->hasOne('App\Category', 'id', 'category');
//    }
//     public function getPrice()
//    {   
//        return $this->hasOne('App\Product', 'price', 'price_o');
//    }
     
}
