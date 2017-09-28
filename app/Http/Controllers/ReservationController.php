<?php

namespace App\Http\Controllers;

use Validator;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), Reservation::$rules, Reservation::$messages);
        if($validator->fails()){
          return back()->with(['fail' => 1,'errors'=>$validator->messages()]);
        }
        $input = $request->only('started_at', 'ended_at', 'message', 'resource_id');
        // dd($input);
        $already_reserved = Reservation::where('started_at', '<', $input['ended_at'])->where('ended_at', '>', $input['started_at'])->count();
        if($already_reserved > 0) {
            return back()->with(['occupied' => 1]);
        }
        $reservation = Auth::user()->reservations()->create($input);
        return redirect()->action('ResourceController@show', ['resource' => $input['resource_id']]);
    }

    public function show(Reservation $reservation)
    {
        //
    }

    public function edit(Reservation $reservation)
    {
        //
    }

    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    public function destroy(Reservation $reservation)
    {
        //
    }
}
