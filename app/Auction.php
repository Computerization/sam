<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    //

    public function files(){
      return $this->belongsToMany('App\File');
    }

    public function auction_requests(){
        return $this->hasMany('App\AuctionRequest');
      }
  
      public function user(){
        return $this->belongsTo('App\User');
      }
  
      protected $fillable = ['name', 'descriptions', 'user_id', 'min_price', 'cur_price', 'start', 'due'];

      protected $table = 'auctions';
}
