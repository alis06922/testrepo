<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   protected $fillable = [
        'name', 'email', 'password','username','mobile','balance','tauth','docv','tfver','status','emailv','smsv','vsent','vercode','secretcode','refer', 'photo','country', 'city','address','zip'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
     public function docver()
    {
        return $this->hasOne('App\Docver', 'id', 'user_id');
    }

    public function sell()
    {
        return $this->hasMany('App\Sell', 'id', 'user_id');
    }

     public function lending()
    {
        return $this->hasMany('App\Lending', 'id', 'user_id');
    }

    public function address()
    {
        return $this->hasMany('App\Address','id','user_id');
    }
        public function withdraw()
    {
        return $this->hasMany('App\Withdraw','id','user_id');
    }
}
