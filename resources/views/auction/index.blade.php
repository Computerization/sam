@extends('layouts.app_bs4')

@section('title')
2017 Why Charity Auction
@endsection


@section('content')

<style>
.shadow{
    text-shadow: 0 0 3px #000000;
}
</style>

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
                <div class="card bg-dark text-white">
                    @if($auction->files->count() > 0)
                    <img class="card-img" style="opacity: 0.5;" src="/image/{{ $auction->files->first()->id }}">
                    @endif
                    <div class="card-img-overlay d-flex align-items-start flex-column shadow">
                        <h4 class="card-title">{{ $auction->name }}</h4>
                        {{--  <p class="card-text">{{ $auction->description }}</p>  --}}
                        <a href="{{ URL::action('Auctioncontroller@show',$auction->id) }}" class="btn btn-secondary">查看详情</a>
                        <h1 class="card-title mt-auto">￥{{ $auction->cur_price }}</h1>
                </div>
            </div>
            @endforeach
            </div>
        </div>
    </div>

@endsection