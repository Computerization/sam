@extends('layouts.semantic')

@section('content')
<div class="ui container">
    <div class="ui basic segment">
          <h1>{{ $vote_group -> group_name }}</h1>
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
        @if($vote_group -> description != null)
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Notice</h4>
            </div>
            <div class="card-body">
              {!! $vote_group -> description !!}
            </div>
          </div>
        </div>
        @endif

        <!-- <div class="col-md-12"> -->
        <div class="ui huge very relaxed divided list">
          @foreach($vote_group->votes as $vote)
            <div class="item">
              <div class="content">
                <a href="{{ url('vote',$vote->id) }}">{{ $vote->vote_name }} </a>
                <div class="description">Created by {{ $vote->user->name }} at {{ $vote->created_at }}</div>
              </div>
            </div>
          @endforeach
        </div>
        <!-- </div> -->
    </div>
</div>
@endsection
