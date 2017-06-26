<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    //

    public function questions(){
      return $this->hasMany('App\Question');
    }

    public function user(){
      return $this->belongsTo('App\User');
    }

    public function vote_groups(){
      return $this->belongsToMany('App\VoteGroup');
    }

    protected $fillable = ['vote_name', 'user_id'];

}
