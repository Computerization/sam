<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    //
    public function orgs(){
      return $this->belongsToMany('App\Organization');
    }

    public function user(){
      return $this->belongsTo('App\User');
    }

    protected $fillable = ['email', 'name', 'student_number', 'contact', 'additional_info', 'user_id'];
}
