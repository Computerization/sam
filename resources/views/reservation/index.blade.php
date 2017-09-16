@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 col-xs-12">


          <div class="row">
            <div class="col-md-2">
              <h1><a href="{{ URL::action('ResourceController@index') }}">预约</a></h1>
            </div>
            <div class="col-md-4">
              <form action="{{ URL::action('ResourceController@index') }}" method="get">
                <h4>搜索</h4>
                <div class="input-group">
                  <input type="text" class="form-control" name="keyword" placeholder="">
                  <span class="input-group-btn">
                    <button class="btn btn-primary" type="button">Go!</button>
                  </span>
                </div>
              </form>
            </div>
          </div>

          <hr>
          <div class="row">
            @foreach($resources as $resource)
              @include('reservation.resource', ['resource' => $resource, 'wide' => false])
            @endforeach
          </div>
        </div>
    </div>
</div>

@endsection
