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

    public function pending_members(){
      return $this->belongsToMany('App\User')->withPivot('member_role')->withTimestamps()->wherePivot('organization_authentication_id', 0);
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

    public function articles(){
      return $this->hasMany('App\Article');
    }

    public function orderroom(){
      return $this->hasMany('App\orderroom');
    }

    protected $fillable = ['organization_name','organization_description'];
}
