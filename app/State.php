<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    //
    protected $table = 'states';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'country_id'
    ];
}


