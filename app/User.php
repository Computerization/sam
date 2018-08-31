<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function votes(){
      return $this->hasMany('App\Vote');
    }

    public function vote_groups(){
      return $this->hasMany('App\VoteGroup');
    }

    public function organizations(){
      return $this->belongsToMany('App\Organization');
    }

    public function resume(){
      return $this->hasOne('App\Resume');
    }

    public function files(){
      return $this->hasMany('App\File');
    }

    public function resources(){
      return $this->hasMany('App\Resource');
    }

    public function reservations(){
      return $this->hasMany('App\Reservation');
    }

    // public function orgauth(){
    //   return $this->belongsToMany('')
    // }

}
