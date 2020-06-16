<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    protected $table = 'countries';
    protected $primaryKey = 'id';
    protected $fillable = [
        'sortname', 'name', 'phonecode'
    ];

    public $timestamps = false;

    

}
