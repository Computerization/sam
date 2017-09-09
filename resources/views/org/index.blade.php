@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-xs-12">

          <h1>{{ trans('org.org') }}</h1>

          <hr>
          <div class="row">
            @foreach($orgs as $org)
            <div class=" col-md-4 col-sm-6 col-xs-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4>{{ $org->organization_name }}</h4>
                </div>
                <div class="panel-body">
                  <p>{!! Purifier::clean($org->organization_description) !!}</p>
                  <div class="col-md-6"><i class="fa fa-user-o" aria-hidden="true"></i> {{ $org->user->name }}</div>
                  <div class="col-md-6"><i class="fa fa-envelope-o" aria-hidden="true"></i> {{ $org->organization_contact }}</div>
                </div>
                <div class="panel-footer">
                  <a href="{{ url('org', $org->id) }}" class="btn btn-primary">{{ trans('org.detail') }}</a>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
    </div>
</div>
@endsection
