@extends('layouts.semantic')

@section('title')
Student Organizations - 
@endsection

@section('content')

<style>
    .hideoverflow {
        overflow: hidden;
        /* text-overflow: ellipsis; */
        /* display: -webkit-box; */
        /* -webkit-line-clamp: 3; */
        line-height: 1.5em;
        max-height: 12em;
        }

        /* .image{
            width:100%;
            height:0px;
            padding-bottom:100%;
            position:relative;
        } */
        /* .image img{
                width:100%;
                height:100%;
                position:absolute;
        } */

        .org-cell {
          height: 18em; !important;
          overflow: hidden;!important;
        }

</style>

<h1 class="ui center aligned header">{{ trans('org.org') }}</h1>
<h4 class="ui center aligned header">The Honor of WFLA</h4>

<div class="ui center aligned header">
  <div class="ui search">
    <div class="ui icon input">
      <form action="{{ URL::action('OrganizationController@search') }}" method="get" id="search-org"></form>
      <input class="prompt" type="text" placeholder="{{ $keyword }}" name="keyword" form="search-org">
      <i class="search icon"></i>
    </div>
    <div class="results"></div>
  </div>
</div>

<div class="ui center aligned header">
  <a class="ui large olive label">IB<div class="detail">C</div></a>
  <a class="ui large red label">IB<div class="detail">A</div></a>
  <a class="ui large blue label">IB<div class="detail">S</div></a>
  <a class="ui large orange label">Tech</a>
  <a class="ui large green label">Sport</a>
  <a class="ui large teal label">Art</a>
  <a class="ui large violet label">Debate</a>
  <a class="ui large purple label">Volunteer</a>
</div>

<div class="ui container">
  <div class="ui section divider"></div>
</div>

<div class="ui container special four column grid stackable">
  @foreach($orgs as $org)
    @include('org.single_org', ['org' => $org])
  @endforeach
</div>

<script>
  $('.image').dimmer({
  on: 'hover'
  });
</script>

@endsection
