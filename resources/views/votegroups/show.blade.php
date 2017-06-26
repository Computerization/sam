@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <a class="btn btn-lg btn-default" href="{{ URL::action('VoteGroupController@index') }}">Back</a>
            <h1>{{ $vote_group->group_name }}</h1>
            @if ($errors->any())
                <hr>
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(Auth::user()->group > 0)
            <hr>
            <div>
              <a href="{{ URL::action('VoteGroupController@selectvote',$vote_group->id) }}" class="btn btn-primary btn-lg">Modify Votes</a>
              <hr>
              <form action="{{ URL::action('VoteGroupController@destroy',$vote_group->id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="btn btn-danger" type="submit">Delete</button>
              </form>
            </div>
            @endif
            <hr>
            @foreach($vote_group->votes as $vote)
            <div class="panel panel-default">
              <div class="panel-body">
                <h4><a href="{{ url('vote',$vote->id) }}">{{ $vote->vote_name }} </a></h4>
                <div>{{ $vote->user->name }} @ {{ $vote->created_at }}
                @if(Auth::user()->group > 0)
                   - <a class="" href="{{ URL::action('VoteController@stat',$vote->id) }}">Stat and Control</a>
                @endif
                </div>
              </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
