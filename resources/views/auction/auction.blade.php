@extends('layouts.app_bs4')

@section('content')

    <div class="container">
    <div class="row">
        <div class="col-md-12" id="alert-box">
            
        </div>  
    </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                @if($auction->files->count() > 0)
                    <img class="card-img-top" src="/image/{{ $auction->files->first()->id }}">
                    @endif
                    <div class="card-body">
                        <h4 class="d-flex justify-content-around">{{ $auction->name }}</h4>
                        <p class="d-flex justify-content-around"><span>{{ $auction->user->name }}</span></p>
                        <hr>
                        <div class="d-flex justify-content-around">
                        <h4>Start</h4>
                        <h4>Due</h4>
                        </div>
                        <div class="d-flex justify-content-around">
                        <span>{{ $auction->start }}</span>
                        <span>{{ $auction->due }}</span>
                        </div>
                        <hr>
                        <p class="card-text">{{ $auction->description }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Highest Price</h4>
                        <h1 class="">$<span id="cur-bid"></span></h1>
                        <p><span id="cur-bid-uname"></span> at <span id="cur-bid-time"></span></p>
                    </div>
                    <hr>
                    <div class="card-body">
                        <h4 class="card-title">Place Bid</h4>

                        <form>
                            <div class="input-group  input-group-lg">
                                <span class="input-group-addon">$</span>
                                <input type="number" id="bid-price" class="form-control">
                                <span class="input-group-btn">
                                        <button class="btn btn-primary" id="submit-bid" type="button">Bid</button>
                                </span>
                            </div>
                        </form>

                    </div>
                    <hr>
                    <div class="card-body">
                        <h4 class="card-title">History Pricing</h4>
                    </div>
                    <ul class="list-group list-group-flush" id="history-pricing">
                    @if($auction->auction_requests->count() > 0)
                    @foreach($auction->auction_requests()->orderBy("created_at", "desc")->get() as $request)
                        <li class="list-group-item">
                            <span class="lead">${{ $request->bid }}</span> by {{ $request->user->name }} at {{ $request->created_at }}
                        </li>
                       @endforeach
                       @endif
                    </ul>

                </div>
            </div>
        </div>
    </div>
   
@endsection

@section('script')

   <script>

        function alert_bs(type, msg){
            $("#alert-box").html('<div class="alert alert-'+ type +' alert-dismissible fade show" role="alert"> '+ msg +' <button type="button" class="close" data-dismiss="alert" aria-label="Close">        <span aria-hidden="true">&times;</span>  </button>  </div>');
        }
        @if(Auth::check())
        var login = 1;
        @else
        var login = 0;
        @endif
        var aid = {{ $auction->id }};
        var initial_price = {{ $auction->min_price }};
        var cur_bid;
        var cur_bid_uname;
        var cur_bid_time;
        var bid_count = {{ $auction->auction_requests->count() }};
        @if ($auction->auction_requests->count() > 0)
        cur_bid = {{ $auction->auction_requests()->latest()->first()->bid }};
        cur_bid_uname = "{{ $auction->auction_requests()->latest()->first()->user->name }}";
        cur_bid_time = "{{ $auction->auction_requests()->latest()->first()->created_at->toDateTimeString() }}";
        @endif
        var add_max = 100;
        var bid;
        $(document).ready(function(){
            if(!login){
                alert_bs("warning", '您尚未登录，建议您立即登录。<a href="{{ url("/login") }}">点我去登录</a>');
            }
            if(bid_count == 0){
                $("#cur-bid").html(initial_price);
            }else{
                $("#cur-bid").html(cur_bid);
                $("#cur-bid-uname").html(cur_bid_uname);
                $("#cur-bid-time").html(cur_bid_time);
            }
            $("#submit-bid").click(function(){
                if(!login){
                    alert_bs("warning", '您尚未登录，登录后才能出价。<a href="{{ url("/login") }}">点我去登录</a>');
                }
                bid = parseInt($("#bid-price").val());
                if(bid <= cur_bid){
                    alert_bs("danger", "出价低于当前价格");
                }else if(bid > cur_bid + add_max){
                    alert_bs("danger", "出价大于单次加价限制。");
                }else{
                    $.post( "{{ url('auction/bid') }}", {auction_id : aid, bid : bid}, function( data ) {
                        if(data.success == 1){
                           alert_bs("success", "出价成功");
                           cur_bid = bid;
                        }else{
                            if(data.err_code == 1){
                                alert_bs("danger", "出价错误");
                            }else if(data.err_code == 2){
                                alert_bs("danger", "出价尚未开始。");
                            }else if(data.err_code == 3){
                                alert_bs("danger", "出价已结束。");
                            }
                        }
                    
                });
                }
            });
        });
        $(function() {
            var socket = io("http://103.253.147.75:3000/");
            socket.on('auction-'+aid.toString(), function(msg) {
                alert_bs("info", "价格已更新。");
                $('#cur-bid').html(msg.bid);
                $("#cur-bid-uname").html(msg.uname);
                $("#cur-bid-time").html(msg.time);
                $("#history-pricing").prepend('<li class="list-group-item"> <span class="lead">$'+ msg.bid +' </span> by '+ msg.uname +' at '+ msg.time +'  </li>');
            });
        });
    </script>
    <script src="https://cdn.socket.io/socket.io-1.2.0.js"></script>
@endsection