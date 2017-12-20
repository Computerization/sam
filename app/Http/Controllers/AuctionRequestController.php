<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\AuctionRequest;
use App\Auction;
use App\Events\PushAuction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class AuctionRequestController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $validator = Validator::make($request->all(), AuctionRequest::$rules, AuctionRequest::$msg);
        // if(!$validator){
        //     return response()->json([
        //         'success' => '0',
        //         'err_code' => '1',
        //     ]);
        // }
        $MAX_ADD = 100;

        $arequest = $request->only('bid', 'auction_id');
        $arequest['user_id'] = Auth::id();
        $auction = Auction::findOrFail($request->auction_id);
        $cur_price = $auction->cur_price;
        $last_uid = $auction->last_bid_uid;
        if($cur_price >= $arequest['bid'] || $cur_price + $MAX_ADD < $arequest['bid']){
            return response()->json([
                'success' => '0',
                'err_code' => '1',
            ]);
        }
        if($last_uid == Auth::id()){
            return response()->json([
                'success' => '0',
                'err_code' => '4',
            ]);
        }
        if(Carbon::now() < $auction->start){
            return response()->json([
                'success' => '0',
                'err_code' => '2',
            ]);
        }
        if(Carbon::now() > $auction->due){
            return response()->json([
                'success' => '0',
                'err_code' => '3',
            ]);
        }
        $query = AuctionRequest::create($arequest);
        $auction->cur_price = $arequest['bid'];
        $auction->last_bid_uid = Auth::id();
        $auction->save();
        $arequest['uname'] = Auth::user()->name;
        $arequest['time'] = $query->created_at->toDateTimeString();
        Redis::publish('auction', json_encode($arequest));
        // broadcast(new PushAuction($arequest['auction_id'], $arequest['bid'], Auth::id(), Carbon::now()));
        return response()->json([
            'success' => '1',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AuctionRequest  $auctionRequest
     * @return \Illuminate\Http\Response
     */
    public function show(AuctionRequest $auctionRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AuctionRequest  $auctionRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(AuctionRequest $auctionRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AuctionRequest  $auctionRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AuctionRequest $auctionRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AuctionRequest  $auctionRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(AuctionRequest $auctionRequest)
    {
        //
    }
}
