<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VoteGroup extends Model
{
    //
    public function votes(){
      return $this->belongsToMany('App\Vote');
    }

    public function user(){
      return $this->belongsTo('App\User');
    }

    protected $fillable = ['group_name','user_id'];
}
