<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $dates=['deleted_at'];
         
    protected $fillable = [
      'token', 'name', 'email','date' ,'password','country','state','city','gender','user_type','dashboard','hobbies','address','academics'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getCountry()
    {   
        return $this->hasOne('App\Country', 'id', 'country');
    }

    public function getState()
    {
        return $this->hasOne('App\State','id', 'state');
    }

    public function getCity()
    {
        return $this->hasOne('App\City','id', 'city');
    }

}
