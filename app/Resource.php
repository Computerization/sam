<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    //
    protected $fillable = ['name', 'description', 'user_id'];

    public static $rules = [
      'name' => 'required|max:255',
      'description' => 'required|max:10000',
    ];

    public static $messages = [
        'name.required' => '名称必填。',
        'name.max' => '名称太长。',
        'description.required' => '描述必填。',
        'description.max' => '描述太长。（5000字限制）',
    ];

    public function reservations(){
      return $this->hasMany('App\Reservation');
    }

    public function files(){
      return $this->belongsToMany('App\File');
    }

    public function user(){
      return $this->belongsTo('App\User');
    }
}
