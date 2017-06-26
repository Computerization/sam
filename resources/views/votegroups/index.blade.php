@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h1>Vote Groups</h1>
          @if(Auth::user()->group > 0)
          <hr>
             <a class="btn btn-success" href="{{ url('/group/create') }}">New Vote Group...</a>
          @endif
          @if (session('status'))
          <hr>
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
          @endif
          <hr>
            @foreach($vote_groups as $vote_group)
            <div class="panel panel-default">
              <div class="panel-body">
                <h4><a href="{{ URL::action('VoteGroupController@show',['id'=>$vote_group->id]) }}">{{ $vote_group->group_name }} </a></h4>
                <div>{{ $vote_group->user->name }} @ {{ $vote_group->created_at }}</div>
              </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
