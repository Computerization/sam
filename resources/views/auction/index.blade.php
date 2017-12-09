@extends('layouts.app_bs4')
@section('content')

    <div class="container">
        <div class="row">
            <div class="jumbotron w-100">
                <h1 class="display-4 d-flex justify-content-around">2017 Why Charity 慈善晚会 作品拍卖</h1>
                <p class="lead d-flex justify-content-around"></p>
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