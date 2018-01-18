@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a class="btn btn-lg btn-default" href="{{ url('/vote') }}">Back</a>
            <h1>{{ $vote->vote_name }}</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <hr>
            <form class="" action="{{ URL::action('VoteController@submit',$vote->id) }}" method="post">
              {{ csrf_field() }}
              @foreach($vote->questions as $question)
              <div class="panel panel-default">
                <div class="panel-body">
                  @if($question->type == 1)
                    @include('votes.question.text')
                  @endif
                  @if($question->type == 2)
                    @include('votes.question.radio')
                  @endif

                </div>
              </div>
              @endforeach
              <button type="submit" class="btn btn-lg btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
