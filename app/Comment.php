<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

    public function user(){
      return $this->belongsTo('App\User');
    }

    protected $fillable = ['article_id', 'user_id', 'content'];
}
