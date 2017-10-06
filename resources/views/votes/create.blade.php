@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

          @if($type > 0)
          <form class="" action="{{ URL::action('VoteController@update',$vote->id) }}" method="post" id="form"></form>
          <a class="btn btn-lg btn-default" href="{{ URL::action('VoteController@stat',$vote->id) }}">Back</a>
          @else
          <form class="" action="{{ url('/vote/create') }}" method="post" id="form"></form>
          <a class="btn btn-lg btn-default" href="{{ URL::action('VoteController@index') }}">Back</a>
          @endif

            <div class="form-group">
              <label for="vote_name"></label>
              @if($type > 0)
              <input type="text" class="form-control input-lg" id="vote_name" name="vote_name" form="form" value="{{ $vote->vote_name }}">
              @else
              <input type="text" class="form-control input-lg" id="vote_name" name="vote_name" form="form">
              @endif
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(!empty(session('status')))
            <hr>
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <hr>
              <input type="hidden" name="_token" value="{{ csrf_token() }}" form="form">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4>Edit Questions</h4> <button type="button" class="btn btn-success" id="add-question">Add Questions</button>
                </div>
                <div class="panel-body" id="question-area">
                  @if($type > 0)
                    @foreach ($vote->questions as $question)
                    <div class="form-group">
                      <textarea class="form-control" rows="3" name="question[{{ $question->id }}][question_content]" form="form">{{ $question->question_content }}</textarea>
                      <form action="{{ URL::action('QuestionController@destroy',$question->id) }}" method="post" id="form{{ $question->id }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <br>
                        <button class="btn btn-danger" type="submit" form="form{{ $question->id }}">Delete</button>
                      </form>
                      <input type="hidden" name="question[{{ $question->id }}][id]" form="form" value="{{ $question->id }}">
                    </div>
                    <hr>
                    @endforeach
                  @else
                  <div class="form-group">
                    <input type="text" class="form-control" name="question[][question_content]" form="form">
                  </div>
                  <hr>
                  @endif
                </div>
              </div>

              <button type="submit" class="btn btn-lg btn-primary" form="form">Submit</button>

        </div>
    </div>
</div>


<script>
$(document).ready(function (){
  $("#add-question").click(function(){
    $("#question-area").append("<div class=\"form-group\">    <input type=\"text\" class=\"form-control\" name=\"question[][question_content]\" form=\"form\">  </div><hr>");
  });
});

</script>

@endsection
