@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

          <form class="" action="{{ url('/vote/create') }}" method="post">
            <a class="btn btn-lg btn-default" href="{{ url('/vote') }}">Back</a>
            <div class="form-group">
              <label for="vote_name"></label>
              <input type="text" class="form-control input-lg" id="vote_name" name="vote_name">
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
            <hr>

              {{ csrf_field() }}
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4>Edit Questions</h4> <button type="button" class="btn btn-success" id="add-question">Add Questions</button>
                </div>
                <div class="panel-body" id="question-area">
                  <div class="form-group">
                    <input type="text" class="form-control" name="question[][question_content]">
                  </div>
                </div>
              </div>

              <button type="submit" class="btn btn-lg btn-primary">Submit</button>
          </form>
        </div>
    </div>
</div>


<script>
$(document).ready(function (){
  $("#add-question").click(function(){
    $("#question-area").append("<hr><div class=\"form-group\">    <input type=\"text\" class=\"form-control\" name=\"question[][question_content]\">  </div>");
  });
});

</script>

@endsection
