<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\AuctionRequest;
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
        $arequest = $request->only('bid', 'auction_id');
        $arequest['user_id'] = Auth::id();
        AuctionRequest::create($arequest);
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
