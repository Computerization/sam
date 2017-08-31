@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-xs-12">
          @if(session('msg'))
            <div class="panel panel-success">
              <div class="panel-heading">
                <h4>{{ session('msg') }}</h4>
              </div>
              <div class="panel-body">
                {{ trans('resume.recorded') }}
              </div>
            </div>
          @endif
          <div class="jumbotron" style="background-color:white;">
            <h1>{{ $org->organization_name }}</h1>
            <p>{!! Purifier::clean($org->organization_description) !!}</p>
            <p><a class="btn btn-primary btn-lg" href="{{ URL::action('OrganizationController@join',$org->id) }}" role="button">{{ trans('org.join') }}</a></p>
          </div>

        </div>
    </div>
</div>
@endsection
