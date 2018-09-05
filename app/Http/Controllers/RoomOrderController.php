<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\orderroom;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RoomOrderController extends Controller
{
    //
    public function index(){
        // Select only entries updated this week
        $order = orderroom::all()->where('organization_id', '!==', NULL)->where('updated_at', '>=', Carbon::now()->startOfWeek())->where('updated_at', '<=', Carbon::now()->endOfWeek());

        return view('orderroom.show', ['order' => $order]);
    }

    public function update(Request $request) {
        $org_id = DB::select('select * from organizations where user_id = :id', ['id' => Auth::id()]);

        if ($org_id==null) {
            return redirect()->action('RoomOrderController@index')->with('alert', '只有社长才有预约活动教室的权力！');
        }

        if (orderroom::all()->where('updated_at', '>=', Carbon::now()->startOfWeek())->where('updated_at', '<=', Carbon::now()->endOfWeek())->where('user_id', Auth::id())->count() >= 2) {
            return redirect()->action('RoomOrderController@index')->with('alert', '你最多只能每周预约两间教室！');
        }

        if (orderroom::all()->where('organization_id', '!==', NULL)->where('room_id', $request->room)->where('day', $request->day)->where('time', $request->time)->where('updated_at', '>=', Carbon::now()->startOfWeek())->where('updated_at', '<=', Carbon::now()->endOfWeek())->count() > 0) {
            return redirect()->action('RoomOrderController@index')->with('alert', '该教室已被预订！如你确认本教室未被预订，请联系系统管理员');
        }

        $order = orderroom::all()->where('room_id', $request->room)->where('day', $request->day)->where('time', $request->time)->first();

        if ($order == null) {
            // Create if entry does not exist
            $order = new orderroom;
            $order->room_id = $request->room;
            $order->day = $request->day;
            $order->time = $request->time;
        }
        // Update the person who books
        $order->user_id = Auth::id();
        $order->organization_id = $org_id[0]->id;
        $order->save();

        return redirect()->action('RoomOrderController@index');
    }

    public function delete(Request $request) {
        $order = orderroom::all()->where('room_id', $request->room)->where('day', $request->day)->where('time', $request->time)->first();
        if ($order->user_id !== Auth::id()) {
            return redirect()->action('RoomOrderController@index')->with('alert', '你无法删除其他人的预订，若你确定这是你的预订，请联系管理员');
        }
        $order->user_id = NULL;
        $order->organization_id = NULL;
        $order->save();
        return redirect()->action('RoomOrderController@index');
    }
}
