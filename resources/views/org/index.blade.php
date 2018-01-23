@extends('layouts.app')

@section('content')
    <style media="screen">
    @@media (min-width: 768px) {
        .card-columns {
            column-count: 3;
        };
    }
    @@media (max-width: 768px) {
        .card-columns {
            column-count: 1;
        };
    }
    </style>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="jumbotron">
            <h1>2017 Why Charity 在线拍卖通道</h1>
            <p>请先点击右上角按钮注册，然后点击下面链接进入拍卖主界面。</p>
            <p><a class="btn btn-primary btn-lg" href="{{ url('auction') }}" role="button">点击进入</a></p>
          </div>

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
          <div class="card-columns">
            @foreach($orgs as $org)
              @include('org.single_org', ['org' => $org, 'wide' => false])
            @endforeach
          </div>
        </div>
    </div>
</div>
@endsection
