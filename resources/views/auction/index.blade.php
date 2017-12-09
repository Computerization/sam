@extends('layouts.app_bs4')
@section('content')

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
                 @if($auction->files->count() > 0)
                    <img class="card-img-top" src="/image/{{ $auction->files->first()->id }}">
                    @endif
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

@endsection