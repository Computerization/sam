@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>{{ $vote->vote_name }}</h1>
            <hr>
            @foreach($questions as $question)
            <div class="panel panel-default">
              <div class="panel-body">
                <h4>{{ $question->question_content }}</h4>
                @foreach($question->answers as $answer)
                  <div>{{ $answer->user->name }} - {{ $answer->answer_content }}</div>
                @endforeach
              </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
