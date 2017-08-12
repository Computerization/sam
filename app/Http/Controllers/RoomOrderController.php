<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RoomOrderController extends Controller
{
    //
    public function index(){
      $order_arr = Storage::get('room_order.json');
      $order = json_decode($order_arr, true);
      return view('orderroom.index', ['order' => $order]);
    }

    public function process(Request $request){
      $order_arr = Storage::get('room_order.json');
      $order = json_decode($order_arr, true);
      $time = $request -> time;
      $room = $request -> room;
      if(isset($order[$time][$room]['uid'])){
        if($order[$time][$room]['uid'] == Auth::id()){
          $order[$time][$room]['uid'] = null;
          $order[$time][$room]['content'] = null;
        }
      } else{
        $order[$time][$room]['uid'] = Auth::id();
        $order[$time][$room]['content'] = Auth::user()->name;
      }
      $order_arr = json_encode($order);
      Storage::put('room_order.json',$order_arr);
      return redirect('/order/room');
    }

}
