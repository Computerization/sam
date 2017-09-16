@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-xs-12">
          <!-- @if(session('msg'))
            <div class="panel panel-success">
              <div class="panel-heading">
                <h4>{{ session('msg') }}</h4>
              </div>
              <div class="panel-body">
                {{ trans('resume.recorded') }}
              </div>
            </div>
          @endif -->
          <div class="panel">
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-xs-12">
                  @if($resource->files->count())
                  <div class="thumbnail">
                    <img src="/image/{{ $resource->files->first()->id }}" alt="...">
                  </div>
                  @endif
                </div>
                <div class="col-md-9 col-xs-12">

                  <h1>{{ $resource->name }}</h1>
                  <div class="row">
                    <h4 class="col-md-4 col-xs-12"><i class="fa fa-user-o" aria-hidden="true"></i> {{ $resource->user->name }}</h4>
                  </div>
                  <br>
                  <p><a class="button button-3d button-primary button-rounded" href="" role="button">立即预约</a></p>

                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="col-md-12 col-xs-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="text-center">简介</h4>
            </div>
            <div class="panel-body image-fix">
              {!! Purifier::clean($resource->description) !!}
            </div>
          </div>
        </div>
    </div>
</div>

<style>
  img {
    max-width:100%;
    height:auto;
  }
</style>
@endsection
