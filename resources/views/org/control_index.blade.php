@extends('layouts.control_center')

@section('control_content')

          <h1>{{ trans('org.my_org') }}</h1>

          @if (session('success'))
          <div class="panel panel-success">
            <div class="panel-heading">
              {{ trans('org.success') }}
            </div>
            <div class="panel-body">
              {{ trans('org.create_success') }}
            </div>
          </div>
          @endif

          <hr>
          <div class="row">
            @foreach($orgs as $org)
            <div class=" col-md-6 col-sm-6 col-xs-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4>{{ $org->organization_name }}</h4>
                </div>
                <div class="panel-body">
                  <p>{!! $org->organization_description !!}</p>
                  <div class="col-md-6"><i class="fa fa-user-o" aria-hidden="true"></i> {{ $org->user->name }}</div>
                  <div class="col-md-6"><i class="fa fa-envelope-o" aria-hidden="true"></i> {{ $org->organization_contact }}</div>
                </div>
                <div class="panel-footer">
                  <a href="{{ url('org', $org->id) }}" class="btn btn-primary">{{ trans('org.detail') }}</a>
                  <a href="{{ URL::action('OrganizationController@edit', ['id' => $org->id]) }}" class="btn btn-default">{{ trans('org.edit') }}</a>
                  <a href="{{ URL::action('OrganizationController@show_resumes', ['id' => $org->id]) }}" class="btn btn-default">{{ trans('org.view_resumes') }}</a>
                </div>
              </div>
            </div>
            @endforeach
          </div>
@endsection
