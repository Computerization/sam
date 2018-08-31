@extends('layouts.semantic')

@section('title')
Student Organizations -
@endsection

@section('content')

@foreach($org->authentication as $auth)

<h1>{{ $auth->auth_name }}</h1>
<p>{{ $auth->auth_description }}</p>
<blockquote>
  {{ $auth->auth_json }}
</blockquote>
@foreach($auth->members as $member)

<div>
  <h4>{{ $member->name }}</h4>
  <b>{{ $member->pivot->member_role }}</b>
</div>

@endforeach

@endforeach

@endsection
