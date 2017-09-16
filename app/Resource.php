<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    //
    protected $fillable = ['name', 'description', 'user_id'];

    public function reservations(){
      return $this->hasMany('App\Reservation');
    }

    public function files(){
      return $this->belongsToMany('App\File');
    }

    public function user(){
      return $this->belongsTo('App\User');
    }
}
