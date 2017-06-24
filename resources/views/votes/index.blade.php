@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h1>Votes</h1>
          <hr>
            @foreach($votes as $vote)
            <div class="panel panel-default">
              <div class="panel-body">
                <h4><a href="{{ url('vote',$vote->id) }}">{{ $vote->vote_name }} </a></h4>
                <div>{{ $vote->user->name }} @ {{ $vote->created_at }}</div>
              </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
