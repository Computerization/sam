@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-xs-12">

          <h1>{{ trans('org.org') }}</h1>

          <hr>
          <div class="row">
            @foreach($orgs as $org)
              @include('org.single_org', ['org' => $org, 'wide' => false])
            @endforeach
          </div>
        </div>
    </div>
</div>
@endsection
