@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-4 col-xs-12">
      <h4>{{ trans('nav.home') }}</h4>
      <div class="list-group">
        <a href="{{ URL::action('HomeController@index') }}" class="list-group-item">{{ trans('nav.home') }}</a>
      </div>
      <br>
      <h4>{{ trans('nav.resume') }}</h4>
      <div class="list-group">
        <a href="{{ URL::action('ResumeController@index') }}" class="list-group-item">{{ trans('nav.manage_resume') }}</a>
        <a href="{{ URL::action('ResumeController@control') }}" class="list-group-item">{{ trans('nav.manage_resume_sent_out') }}</a>
      </div>
      <br>
      <h4>{{ trans('nav.orgs') }}</h4>
      <div class="list-group">
        <a href="{{ URL::action('OrganizationController@manage') }}" class="list-group-item">{{ trans('nav.manage_orgs') }}</a>
        <a href="{{ URL::action('OrganizationController@create') }}" class="list-group-item">{{ trans('nav.create_orgs') }}</a>
      </div>
      <br>
      <h4>{{ trans('nav.account') }}</h4>
      <div class="list-group">
        <a href="{{ URL::action('AccountController@profile_edit_show') }}" class="list-group-item">{{ trans('nav.manage_account') }}</a>
        <a href="#" class="list-group-item">{{ trans('nav.modify_password') }}</a>
      </div>
      <br>
      @if(Auth::user()->group > 0)
      <h4>资源管理</h4>
      <div class="list-group">
        <a href="#" class="list-group-item">我的资源</a>
        <a href="{{ URL::action('ResourceController@create') }}" class="list-group-item">新建资源</a>
      </div>
      <br>
      @endif
    </div>
    <div class="col-md-8 col-xs-12">
    @yield('control_content')
    </div>
  </div>
</div>

@endsection

@section('scripts')
  @yield('control_scripts')
@endsection
