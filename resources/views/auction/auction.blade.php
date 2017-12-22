@extends('layouts.app_bs4')

@section('title')
{{ $auction->name }}
@endsection

@section('content')

<style>
body {
    background-color: #212529;
    color: #fff;
}

</style>

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
                    
                </div>
            </div>
            <div class="col-md-6">
                <div class="card bg-dark">
                    <div class="card-body">
                        <h1 class="d-flex justify-content-around">{{ $auction->name }}</h1>
                        {{--  <p class="d-flex justify-content-around"><span>{{ $auction->user->name }}</span></p>  --}}
                        {{--  <hr>
                        <div class="d-flex justify-content-around">
                        <h4>开始</h4>
                        <h4>结束</h4>
                        </div>
                        <div class="d-flex justify-content-around">
                        <span>{{ $auction->start }}</span>
                        <span>{{ $auction->due }}</span>
                        </div>
                        <hr>  --}}
                        
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">时间剩余</h4>
                        <h1 class="count_down display-1 font-weight-bold"><span class="min_num">01</span>:<span class="sec_num">30</span></h1>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">最高价格</h4>
                        <h1 class="display-1 font-weight-bold">￥<span id="cur-bid"></span></h1>
                        {{--  <p><span id="cur-bid-uname"></span> 于 <span id="cur-bid-time"></span></p>  --}}
                        <p>出价时间：<span id="cur-bid-time"></span></p>
                        <div id="socket-msg">
                            <p class='text-danger'>价格实时更新出错，<a href='http://sam.swfla.org/auction/{{ $auction->id }}'>点击使用兼容模式访问本网站</a></p>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">出价</h4>
                        <a href="#" class="btn btn-primary" onclick="post_bid(10)">￥10</a>
                        <a href="#" class="btn btn-primary" onclick="post_bid(50)">￥50</a>
                        <a href="#" class="btn btn-primary" onclick="post_bid(100)">￥100</a>
                        {{--  <form>
                            <div class="input-group  input-group-lg">
                                <span class="input-group-addon">$</span>
                                <input type="number" id="bid-price" class="form-control">
                                <span class="input-group-btn">
                                        <button class="btn btn-primary" id="submit-bid" type="button">Bid</button>
                                </span>
                            </div>
                        </form>  --}}
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">详情</h4>
                        <p class="card-text">{{ $auction->description }}</p>
                    </div>
                    @if(Auth::check())
                    @if(Auth::user()->group == 1)
                    <div class="card-body">
                        <h4 class="card-title">历史出价</h4>
                    </div>
                    <ul class="list-group list-group-flush" id="history-pricing">
                    @if($auction->auction_requests->count() > 0)
                    @foreach($auction->auction_requests()->orderBy("created_at", "desc")->get() as $request)
                        <li class="list-group-item bg-dark">
                            <span class="lead">${{ $request->bid }}</span>  {{ $request->user->name }} 于 {{ $request->created_at }}
                        </li>
                       @endforeach
                       @endif
                    </ul>
                    @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
   
@endsection

@section('script')
    <script src="{{ asset('js/countdown.js') }}"></script>
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
        var cur_bid = {{ $auction->cur_price }};
        var cur_bid_uname;
        var cur_bid_time;
        var bid_count = {{ $auction->auction_requests->count() }};
        @if ($auction->auction_requests->count() > 0)
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
               // $("#cur-bid-uname").html(cur_bid_uname);
                $("#cur-bid-time").html(cur_bid_time);
            }
            $("#submit-bid").click();
        });

        function post_bid(bid){
                bid = bid + cur_bid;
                if(!confirm("您的出价是"+bid+"，确认继续？")){
                    return;
                }
                
                if(!login){
                    alert_bs("warning", '您尚未登录，登录后才能出价。<a href="{{ url("/login") }}">点我去登录</a>');
                }
                // bid = parseInt($("#bid-price").val());
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
                            }else if(data.err_code == 4){
                                alert_bs("danger", "请勿连续出价。");
                            }
                            bid = cur_bid;
                        }
                    
                });
                }
            }

        $(function() {
            var socket = io("http://103.253.147.75:3000/");
            // var socket = io("http://127.0.0.1:3000/");
            socket.on('connect', () => {
                $("#socket-msg").html("<p class='text-muted'>价格实时更新已开启</p>");
            });
            socket.on('error', (error) => {
                $("#socket-msg").html("<p class='text-danger'>价格实时更新出错，<a href='http://sam.swfla.org/auction/{{ $auction->id }}'>点击使用兼容模式访问本网站</a></p>");
            });
            socket.on('auction-'+aid.toString(), function(msg) {
                if(msg.type == 1){
                    alert_bs("info", "价格已更新。");
                    $('#cur-bid').html(msg.bid);
                    $("#cur-bid-uname").html(msg.uname);
                    $("#cur-bid-time").html(msg.time);
                    cur_bid = parseInt(msg.bid);
                    @if(Auth::check())
                    @if(Auth::user()->group == 1)
                    $("#history-pricing").prepend('<li class="list-group-item bg-dark"> <span class="lead">$'+ msg.bid +' </span>  '+ msg.uname +' 于 '+ msg.time +'  </li>');
                    @endif
                    @endif
                }else if(msg.type == 0){
                    var start_time = msg.start;
                    var due_time = msg.due;
                    alert_bs("secondary", "拍卖开始，结束时间为"+due_time+"。");
                    $(function(){
                        $(".count_down").countDown({
                        startTimeStr: start_time,//开始时间
                        endTimeStr: due_time,//结束时间
                        daySelector:".day_num",
                        hourSelector:".hour_num",
                        minSelector:".min_num",
                        secSelector:".sec_num"
                        });
                    });
                }
            });
        });

        var enabled = {{ $auction->enabled }};
        if(enabled == 1){
            var start_time = '{{ $auction->start }}';
            var due_time = '{{ $auction->due }}';
            $(function(){
                $(".count_down").countDown({
                startTimeStr: start_time,//开始时间
                endTimeStr: due_time,//结束时间
                daySelector:".day_num",
                hourSelector:".hour_num",
                minSelector:".min_num",
                secSelector:".sec_num"
                });
            });
        }

    </script>
    <script src="https://cdn.socket.io/socket.io-1.2.0.js"></script>
@endsection