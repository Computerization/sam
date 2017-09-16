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
}
