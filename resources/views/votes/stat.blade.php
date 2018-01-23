@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <a class="btn btn-lg btn-default" href="{{ url('/vote') }}">Back</a>
            <h1>{{ $vote->vote_name }}</h1>
            <a href="{{ URL::action('VoteController@edit',$vote->id) }}" class="btn btn-default">Edit</a>
            <a href="{{ URL::action('VoteController@export',$vote->id) }}" class="btn btn-default">Export</a>

            @if(!empty(session('status')))
            <hr>
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <hr>
            @foreach($questions as $question)
            <div class="card">
              <div class="card-body">
                @if($question->type == 1)
                  @include('votes.question.text')
                @endif
                @if($question->type == 2)
                  @include('votes.question.radio')
                @endif

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
            <br>
            @endforeach


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
                    <form action="{{ URL::action('VoteController@clearResponse',$vote->id) }}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <button class="btn btn-danger" type="submit">Clear Response</button>
                    </form>
                    <hr>
                    <form action="{{ URL::action('VoteController@destroy',$vote->id) }}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <button class="btn btn-danger" type="submit">Delete Entire Vote</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

        </div>
    </div>
</div>
@endsection
