<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\Pivot;

class OrganizationAuthentication extends Model
{
    //
    public function organization(){
      return $this->belongsTo('App\Organization');
    }

    public function members(){
      return $this->belongsToMany('App\User', 'organization_user')->withPivot('member_role');
    }

    protected $fillable = ['organization_id', 'auth_name', 'auth_description', 'auth_json'];
}
