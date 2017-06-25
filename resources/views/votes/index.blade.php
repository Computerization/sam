@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h1>Votes</h1>
          @if(Auth::user()->group > 0)
             <a class="btn btn-success" href="{{ url('/vote/create') }}">New Vote...</a>
          @endif
          @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
          @endif
          <hr>
            @foreach($votes as $vote)
            <div class="panel panel-default">
              <div class="panel-body">
                <h4><a href="{{ url('vote',$vote->id) }}">{{ $vote->vote_name }} </a></h4>
                <div>{{ $vote->user->name }} @ {{ $vote->created_at }}
                @if(Auth::user()->group > 0)
                   - <a class="" href="{{ URL::action('VoteController@stat',$vote->id) }}">View Stat</a>
                @endif
                </div>
              </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
