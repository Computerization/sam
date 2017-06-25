@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a class="btn btn-lg btn-default" href="{{ url('/vote') }}">Back</a>
            <h1>{{ $vote->vote_name }}</h1>
            <a href="{{ URL::action('VoteController@edit',$vote->id) }}" class="btn btn-primary">Edit</a>
            <a href="#" class="btn btn-success">Download CSV</a>

            <hr>
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel panel-danger">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Danger Zone
                    </a>
                  </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">
                    <a href="#" class="btn btn-danger">Clear Response</a>
                    <a href="#" class="btn btn-danger">Delete Vote</a>
                  </div>
                </div>
              </div>
            </div>

            <hr>
            @foreach($questions as $question)
            <div class="panel panel-default">
              <div class="panel-body">
                <h4>{{ $question->question_content }}</h4>

                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>User Name</th>
                      <th>Response</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($question->answers as $answer)
                      <tr>
                        <th scope="row">{{ $answer->id }}</th>
                        <td>{{ $answer->user->name }}</td>
                        <td>{{ $answer->answer_content }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>

              </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
