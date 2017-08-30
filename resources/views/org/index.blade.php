@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-xs-12">
          <h1>{{ trans('org.org') }}</h1>

          <hr>
          <div class="row">
            @foreach($orgs as $org)
            <div class=" col-md-3 col-sm-4 col-xs-12">
              <div class="panel panel-default">
                <div class="panel-body">
                  <h4><a href="{{ url('org',$org->id) }}">{{ $org->organization_name }} </a></h4>
                  <div>{{ $org->user->name }}</div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
    </div>
</div>
@endsection
