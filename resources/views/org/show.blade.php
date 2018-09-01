@extends('layouts.semantic')

@section('title')
{{ $org->organization_name }} - Student Organizations -
@endsection

@section('content')

@if($org->file_id)
<div class="ui hidden divider"></div>
<div class="ui container grid">
  <div class="three wide column centered">
    <img class="ui medium rounded image" src="/image/{{ $org->file_id }}">
  </div>
</div>
@endif
<!-- <div class="ui hidden divider"></div> -->
<h1 class="ui center aligned header">{{ $org->organization_name }}</h1>

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

<div class="ui hidden divider"></div>

<div class="ui container grid stackable">
  <div class="eight wide column centered">
    <div class="ui container piled segment">
      <p>{{ $org->organization_intro }}</p>
    </div>
  </div>
</div>

<div class="ui hidden divider"></div>

<div class="ui center aligned grid">
  <a href="#organization_description" class="ui primary button">关于我们</a>
</div>

<div class="ui hidden divider"></div>
<div class="ui hidden divider"></div>

<div class="ui container horizontal divider">
  <h1>
    <i class="user icon"></i>
    团队
  </h1>
</div>

@include('org.modules.team')

<div class="ui hidden divider"></div>
<div class="ui hidden divider"></div>

<div class=" ui container horizontal divider" id="organization_description">
  <h1>
    <i class="tag icon"></i>
    社团简介
  </h1>
</div>
@include('org.modules.description')

<div class="ui hidden divider"></div>

@endsection
