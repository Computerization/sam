@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
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
            <div class="list-group">
            @foreach($vote_groups as $vote_group)
              <a href="{{ URL::action('VoteGroupController@show',['id'=>$vote_group->id]) }}" class="list-group-item">
                <h4 class="list-group-item-heading">{{ $vote_group->group_name }}</h4>
                <p class="list-group-item-text">{{ $vote_group->user->name }} - {{ $vote_group->created_at }}</p>
              </a>
            @endforeach
            </div>
        </div>
        <div class="col-md-8 card-columns" style="column-count:2;">
          @foreach($votes as $vote)
          {{-- <div class="col-md-4"> --}}
            <div class="card">
              <div class="card-body">
                <h4><a href="{{ url('vote',$vote->id) }}">{{ $vote->vote_name }} </a></h4>
                <p>{{ $vote->user->name }} - {{ $vote->created_at }}</p>
              </div>
            </div>
          {{-- </div> --}}
          <br>
          @endforeach
        </div>
    </div>
</div>
@endsection
