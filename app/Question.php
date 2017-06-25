<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    public function answers(){
      return $this->hasMany('App\Answer');
    }

    protected $fillable = ['question_content', 'vote_id'];

}
