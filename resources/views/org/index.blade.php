@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-xs-12">


          <div class="row">
            <div class="col-md-2">
              <h1><a href="{{ URL::action('OrganizationController@index') }}">{{ trans('org.org') }}</a></h1>
            </div>
            <div class="col-md-4">
              <form action="{{ URL::action('OrganizationController@search') }}" method="get">
                <h4>搜索社团</h4>
                <div class="input-group">
                  <input type="text" class="form-control" name="keyword" placeholder="{{ $keyword }}">
                  <span class="input-group-btn">
                    <button class="btn btn-primary" type="button">Go!</button>
                  </span>
                </div>
              </form>
            </div>
          </div>

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
