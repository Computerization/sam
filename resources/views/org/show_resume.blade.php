@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-xs-12">
          <h1>{{ trans('org.view_resumes') }}</h1>

          <hr>
          <div class="row">
            @foreach($resumes as $resume)
            <div class=" col-md-3 col-sm-4 col-xs-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4>{{ $resume->name }}</h4>
                </div>
                <div class="panel-body">
                  <p>{{ $resume->email }}</p>
                  <p>{{ $resume->student_number }}</p>
                </div>
                <div class="panel-footer">
                  <a class="btn btn-default" href="{{ URL::action('ResumeController@show', ['id' => $resume->id]) }}" >{{ trans('org.detail') }}</a>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
    </div>
</div>
@endsection
