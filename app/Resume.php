<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    //
    public function orgs(){
      return $this->belongsToMany('App\Organization');
    }

    protected $fillable = ['email', 'name', 'student_number', 'contact', 'additional_info'];
}
