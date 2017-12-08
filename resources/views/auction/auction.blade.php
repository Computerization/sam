<!doctype html>
<html lang="en">

<head>
    <title>Hello, world!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>

<body>

    <!-- Image and text -->
    <nav class="navbar navbar-light bg-light mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="http://sam.swfla.org/images/logo.svg" width="30" height="30" class="d-inline-block align-top" alt=""> SAM
            </a>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <img class="card-img-top" src="">
                    <div class="card-body">
                        <h4 class="card-title">{{ $auction->name }}</h4>
                        <p class="card-text">{{ $auction->description }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Highest Price</h4>
                        <h1 class="">$<span id="cur-bid"></span></h1>
                        <p>{{ $auction->auction_requests()->latest()->first()->user->name }} at {{ $auction->auction_requests()->latest()->first()->created_at }}</p>
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
                    @foreach($auction->auction_requests as $request)
                        <li class="list-group-item">
                            <h4>${{ $request->bid }}</h4> by {{ $request->user->name }} at {{ $request->created_at }}
                        </li>
                       @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script>
        var aid = {{ $auction->id }};
        var cur_bid = {{ $auction->auction_requests()->latest()->first()->bid }};
        var add_max = 100;
        var bid;
        $(document).ready(function(){
            $("#cur-bid").html(cur_bid);
            $("#submit-bid").click(function(){
                bid = parseInt($("#bid-price").val());
                if(bid <= cur_bid){
                    alert("出价低于当前价格");
                }else if(bid > cur_bid + add_max){
                    alert("出价大于单次加价限制。");
                }else{
                    cur_bid = parseInt($("#bid-price").val());
                    $.post( "{{ url('auction/bid') }}", {auction_id : aid, bid : cur_bid}, function( data ) {
                    alert("出价成功");
                    bid = cur_bid;
                    $("#history-pricing").append('<li class="list-group-item"> <h4>$'+ cur_bid +' </h4> by username at now  </li>');
                });
                }
            });
        });
        $(function() {
            var socket = io("http://127.0.0.1:3000/");
            socket.on('auction', function(msg) {
                $('#cur-bid').html(msg.bid);
                $("#history-pricing").append('<li class="list-group-item"> <h4>$'+ msg.bid +' </h4> by '+ msg.uname +' at now  </li>');
            });
        });
    </script>
    <script src="https://cdn.socket.io/socket.io-1.2.0.js"></script>

</body>

</html>