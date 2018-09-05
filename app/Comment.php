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

    public function get_upvote(){
      return $this->morphToMany('App\User', 'userable')->wherePivot('action_secondary_type', config('organization.attitude.SUPPORT'));
    }

    public function get_downvote(){
      return $this->morphToMany('App\User', 'userable')->wherePivot('action_secondary_type', config('organization.attitude.AGAINST'));
    }


    protected $fillable = ['article_id', 'user_id', 'content'];
}
