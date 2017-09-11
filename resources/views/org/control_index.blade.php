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
              @include('org.single_org', ['org' => $org, 'wide' => true])
            @endforeach
          </div>
@endsection
