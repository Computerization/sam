<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    public function comments(){
      return $this->hasMany('App\Comment');
    }

    public function user(){
      return $this->belongsTo('App\User');
    }

    public function user_stat(){
      return $this->morphToMany('App\User', 'userable');
    }

    public function get_upvote(){
      return $this->morphToMany('App\User', 'userable')->wherePivot('action_secondary_type', config('organization.attitude.SUPPORT'))->withTimestamps();
    }

    public function get_downvote(){
      return $this->morphToMany('App\User', 'userable')->wherePivot('action_secondary_type', config('organization.attitude.AGAINST'))->withTimestamps();
    }


    public function files(){
      return $this->morphToMany('App\File', 'fileable');
    }

    public function pictures(){
      return $this->morphToMany('App\File', 'fileable')->where('type', config('organization.file_type.PICTURE'));
    }

    public function organization(){
      return $this->belongsTo('App\Organization');
    }

    protected $fillable = ['title', 'content', 'content_type', 'content_status', 'comment_status', 'start_at', 'due_at', 'user_id', 'organization_id', 'upvote', 'downvote'];
}
