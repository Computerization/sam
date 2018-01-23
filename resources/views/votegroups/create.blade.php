@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">

          <form action="{{ URL::action('VoteGroupController@store') }}" method="post" id="form"></form>
          <a class="btn btn-lg btn-default" href="{{ URL::action('VoteGroupController@index') }}">Back</a>

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
              <div class="card">
                <div class="card-header">
                  <h4>Step 1 - Create Vote Group</h4>
                </div>
                <div class="card-body" id="question-area">
                  <div class="form-group">
                    <label for="title">Enter Title of Vote Group</label>
                    <input id="title" type="text" class="form-control" name="group_name" form="form">
                  </div>
                </div>
              </div>
              <br>
              <h4>Then Proceed to add Votes.</h4>
              <button type="submit" class="btn btn-lg btn-primary" form="form">Continue</button>

        </div>
    </div>
</div>

@endsection
