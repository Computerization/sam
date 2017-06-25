<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{


    public function user(){
      return $this->belongsTo('App\User');
    }

    protected $fillable = ['answer_content', 'question_id', 'user_id'];

}
