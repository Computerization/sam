<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

    public function user(){
      return $this->belongsTo('App\User');
    }

    public function user_action(){
      return $this->morphToMany('App\User', 'userable');
    }

    protected $fillable = ['article_id', 'user_id', 'content'];
}
