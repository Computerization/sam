<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Organization extends Model
{
    //

    public function user() {
      return $this->belongsTo('App\User');
    }

    public function resumes(){
      return $this->belongsToMany('App\Resume');
    }

    public function file(){
      return $this->belongsTo('App\File');
    }

    protected $fillable = ['organization_name','organization_description'];
}
