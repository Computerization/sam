@extends('layouts.semantic')

@section('title')
Dashboard -
@endsection

@section('content')

<div class="ui hidden divider">

</div>

<div class="ui container stackable grid">
  <div class="four wide column">

    @if($user->files->where('type',1)->count())
    <div class="ui container grid">
      <div class="twelve wide column centered">
        <img class="ui medium rounded image" src="{{ URL::action('FileController@get_image',['id'=>$user->files->where('type',1)->first()->id]) }}">
      </div>
    </div>
    @endif

    <h1 class="ui center aligned header">{{ $user->name }}</h1>

    <div class="ui container piled segment">
      <p>{{ $user->motto }}</p>
    </div>

    <div class="ui secondary container large vertical pointing menu">
      <a class="item" href="{{ URL::action('UserController@show_myhome') }}" id="show-feed">
        <i class="icon home"></i>
        首页
      </a>
      <a class="item" href="{{ URL::action('UserController@show_mycalendar') }}" id="show-feed">
        <i class="icon calendar"></i>
        日历
      </a>
    </div>

  </div>

  <div class="twelve wide column">


    @if($show == 0)

    <div class="ui horizontal divider">
      <h1>
        <i class="home icon"></i>
        首页
      </h1>
    </div>


    @elseif($show == 1)

    <div class="ui horizontal divider">
      <h1>
        <i class="calendar icon"></i>
        日历
      </h1>
    </div>
    @include('user.modules.calendar')

    @endif

  </div>
</div>


@endsection
