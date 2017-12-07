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
            <div class="jumbotron">
                <h1 class="display-3">2017 Why Charity Auction</h1>
                <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
            </div>
        </div>
        <div class="row">
            <div class="card-columns">
            @foreach($auctions as $auction)
                <a href="{{ URL::action('Auctioncontroller@show',$auction->id) }}" class="text-dark">
                <div class="card">
                    <img class="card-img-top" src="http://sam.swfla.org/image/124" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">{{ $auction->name }}</h4>
                        <p class="card-text">{{ $auction->description }}</p>
                    </div>
                </div>
                </a>
            @endforeach
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>

</html>