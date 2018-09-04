<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderroom extends Model
{
    
    protected $fillable = ['room_id', 'day', 'time', 'user_id', 'organization_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function organization(){
        return $this->belongsTo('App\Organization');
    }
}
