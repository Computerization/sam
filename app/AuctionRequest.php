<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuctionRequest extends Model
{
    //
    public function auction(){
        return $this->belongsTo('App\AuctionRequest');
      }
  
      public function user(){
        return $this->belongsTo('App\User');
      }
  
      protected $fillable = ['user_id', 'auction_id', 'bid'];

      protected $table = 'auction_requests';
}
