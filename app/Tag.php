<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //

    public function organizations(){
      return $this->belongsToMany('App\Organization');
    }

    protected $fillable = [
        'tag_content',
    ];
}
