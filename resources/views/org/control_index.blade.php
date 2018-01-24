@extends('layouts.control_center')

@section('control_content')

          <h1>{{ trans('org.my_org') }}</h1>

          @if (session('success'))
          <div class="card text-white bg-success">
            <div class="card-header">
              {{ trans('org.success') }}
            </div>
            <div class="card-body">
              {{ trans('org.create_success') }}
            </div>
          </div>
          @endif

          <hr>
          <div class="card-columns" style="column-count: 1;">
            @foreach($orgs as $org)
              @include('org.single_org', ['org' => $org, 'wide' => true])
            @endforeach
          </div>
@endsection
