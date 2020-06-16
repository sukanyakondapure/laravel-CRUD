<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
     public $timestamps=false;
   //protected $primaryKey = 'id';
    protected $fillable = [
       'id','name', 'type','category','price', 'colour'
    ];
    public function getCategory()
    {   
        return $this->hasOne('App\Category', 'id', 'category');
    }
    
}
