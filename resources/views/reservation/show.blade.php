@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-xs-12">
          @if(session('occupied'))
            <div class="card text-white bg-warning">
              <div class="card-header">
                <h4>预约失败</h4>
              </div>
              <div class="card-body">
                时间段已被占用。请换一个时间再试。
              </div>
            </div>
          @endif

          @if ($errors->any())
          <div class="card">
            <div class="acrd text-white bg-warning">
              <div class="card-header">
                {{ trans('org.error') }}
              </div>
              <div class="card-body">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
              </div>
            </div>
          </div>
          @endif

          <div class="card">
            <div class="card-body">
              <div class="row">
                @if($resource->files->count())
                <div class="col-md-6 col-xs-12">
                  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                      @foreach($resource->files as $file)
                      <li data-target="#carousel-{{ $file->id }}"></li>
                      @endforeach
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                      @foreach($resource->files as $file)
                      <div class="item" id="carousel-{{ $file->id }}">
                        <img src="/image/{{ $file->id }}" alt="...">
                        <div class="carousel-caption">
                          ...
                        </div>
                      </div>
                      @endforeach
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                </div>
                @endif
                <div class="col-md-6 col-xs-12">

                  <h1>{{ $resource->name }}</h1>
                  <div class="row">
                    <h4 class="col-md-12 col-xs-12"><i class="fa fa-user-o" aria-hidden="true"></i> {{ $resource->user->name }}</h4>
                  </div>
                  <br>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="card">
            <div class="card-header">
              <h4 class="text-center">简介</h4>
            </div>
            <div class="card-body image-fix">
              {!! Purifier::clean($resource->description) !!}
            </div>
          </div>
        </div>
    </div><br><div class="row">
        <div class="col-md-3 col-xs-12">
          <div class="card">
            <div class="card-header">
              <h4 class="text-center">预约</h4>
            </div>
            <div class="card-body">

              <form method="post" action="{{ URL::action('ReservationController@store', ['resource' => $resource->id]) }}">
                <h4>选择预约时间</h4>
                {{ csrf_field() }}
                <input type="hidden" value="{{ $resource->id }}" name="resource_id">
                <div class="form-group">
                  <button type="button" id="datetime-picker"  class="button button-3d button-default button-rounded">选择时间</button>
                </div>
                <p>Start At: <b id="start-time"></b></p>
                <p>End At: <b id="end-time"></b></p>
                <input type="hidden" name="started_at" id="start-field">
                <input type="hidden" name="ended_at" id="end-field">
                <hr>
                <div class="form-group">
                  <label for="message">Reservation Message</label>
                  <textarea class="form-control" name="message" id="message"></textarea>
                </div>

                <button type="submit" class="button button-3d button-primary button-rounded">Reserve</button>
              </form>


            </div>
          </div>
        </div>

        <div class="col-md-9 col-xs-12">
          <div class="card">
            <div class="card-header">
              <h4>已有预约</h4>
            </div>
            <div class="card-body">
              @foreach($resource->reservations as $reservation)
                @include('reservation.reservation')
              @endforeach
            </div>
          </div>
        </div>

    </div>
</div>


@endsection

@section('scripts')

<script>
$(document).ready(function () {
  $(".carousel-inner :first-child").addClass('active');
  $("carousel-indicators :first-child").addClass('active');

  $('#datetime-picker').daterangepicker({
    "timePicker": true,
    "timePicker24Hour": true,
    "minDate": moment().format('MM/DD/YYYY'),
    "startDate": moment().format('MM/DD/YYYY'),
    "endDate": moment().format('MM/DD/YYYY'),
    }, function(start, end, label) {
      $("#start-time").text(start.format('YYYY-MM-DD HH:mm:ss'));
      $("#end-time").text(end.format('YYYY-MM-DD HH:mm:ss'));
      $("#start-field").val(start.format('YYYY-MM-DD HH:mm:ss'));
      $("#end-field").val(end.format('YYYY-MM-DD HH:mm:ss'));
    });
});

</script>

@endsection
