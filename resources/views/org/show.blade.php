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
          <div class="panel">
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-xs-4">
                  @if($org->file_id)
                  <div class="thumbnail">
                    <img src="/image/{{ $org->file_id }}" alt="...">
                  </div>
                  @endif
                </div>
                <div class="col-md-9 col-xs-8">

                  <h1>{{ $org->organization_name }}</h1>
                  <p>{{ $org->organization_intro }}</p>
                  <div class="row">
                    <h4 class="col-md-3 col-xs-12"><i class="fa fa-user-o" aria-hidden="true"></i> {{ $org->user->name }}</h4>
                    <h4 class="col-md-3 col-xs-12"><i class="fa fa-envelope-o" aria-hidden="true"></i> {{ $org->organization_contact }}</h4>
                  </div>
                  <br>
                  <p><a class="button button-3d button-primary button-rounded" href="{{ URL::action('OrganizationController@join',$org->id) }}" role="button">{{ trans('org.join') }}</a></p>

                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="col-md-12 col-xs-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="text-center">社团简介</h4>
            </div>
            <div class="panel-body">
              {!! Purifier::clean($org->organization_description) !!}
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
