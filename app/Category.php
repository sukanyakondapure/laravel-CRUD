<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps=false;
    protected $primaryKey = 'id';
    protected $fillable = [
       'name', 'description'
    ];
  
}
 