@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
          <h1>{{ $vote_group -> group_name }}</h1>
          @if(Auth::user()->group > 0)
          <hr>
             <a class="btn btn-success" href="{{ url('/group/create') }}">New Vote Group...</a>
          @endif
          @if (session('status'))
          <hr>
              <div class="alert alert-success">
                  {!! session('status') !!}
              </div>
          @endif
          <hr>
        </div>
        @if($vote_group -> description != null)
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4>Notice</h4>
            </div>
            <div class="panel-body">
              {{ $vote_group -> description }}
            </div>
          </div>
        </div>
        @endif

        <!-- <div class="col-md-12"> -->
          @foreach($vote_group->votes as $vote)
          <div class="col-md-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <h4><a href="{{ url('vote',$vote->id) }}">{{ $vote->vote_name }} </a></h4>
                <p>{{ $vote->user->name }} - {{ $vote->created_at }}</p>
              </div>
            </div>
          </div>
          @endforeach
        <!-- </div> -->
    </div>
</div>
@endsection
