<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Organization extends Model
{
    //

    public function user() {
      return $this->belongsTo('App\User');
    }

    public function members() {
      return $this->belongsToMany('App\User')->withPivot('member_role')->withTimestamps();
    }

    public function authentication() {
      return $this->hasMany('App\OrganizationAuthentication');
    }

    public function resumes(){
      return $this->belongsToMany('App\Resume');
    }

    public function file(){
      return $this->belongsTo('App\File');
    }

    public function tags(){
      return  $this->belongsToMany('App\Tag');
    }

    protected $fillable = ['organization_name','organization_description'];
}
