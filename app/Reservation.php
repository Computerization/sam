<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //
    protected $fillable = ['started_at', 'ended_at', 'user_id', 'resource_id', 'message'];

    public static $rules = [
      'started_at' => 'required',
      'ended_at' => 'required',
      'resource_id' => 'required',
    ];

    public static $messages = [
        'started_at.required' => '时间必选。',
        'ended_at.required' => '时间必选。',
        'resource_id.required' => '资源必选。',
    ];

    public function user(){
      return $this->belongsTo('App\User');
    }

    public function resource(){
      return $this->belongsTo('App\Resource');
    }

}
