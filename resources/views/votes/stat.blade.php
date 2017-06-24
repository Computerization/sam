@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a class="btn btn-lg btn-default" href="{{ url('/vote') }}">Back</a>
            <h1>{{ $vote->vote_name }}</h1>
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
