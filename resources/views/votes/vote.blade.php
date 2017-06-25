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
            <hr>
            <form class="" action="{{ URL::action('VoteController@submit',$vote->id) }}" method="post">
              {{ csrf_field() }}
              @foreach($vote->questions as $question)
              <div class="panel panel-default">
                <div class="panel-body">
                  <h4>{{ $question->question_content }}</h4>
                  <div class="form-group">
                    <label for="q{{ $question->id }}"></label>
                    @if($question->answers->where('user_id',Auth::id())->count()>0)
                    <input type="text" class="form-control" id="q{{ $question->id }}" name="answer[{{ $question->id }}][answer_content]" value="{{ $question->answers->where('user_id',Auth::id())->first()->answer_content }}">
                    @else
                    <input type="text" class="form-control" id="q{{ $question->id }}" name="answer[{{ $question->id }}][answer_content]">
                    @endif
                    <input type="hidden" name="answer[{{ $question->id }}][question_id]" value="{{ $question->id }}">
                  </div>
                </div>
              </div>
              @endforeach
              <button type="submit" class="btn btn-lg btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
