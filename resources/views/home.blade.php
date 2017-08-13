@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                    <hr>
                    <h2>Vote</h2>
                    <h4><a href="{{ url('/vote') }}">Click Here to Proceed to Vote Page.</a></h4>
                    <hr>
                    <h2>Reserve a Classroom</h2>
                    <h4><a href="{{ url('/order/room') }}">Click Here to Proceed to Reservation Page.</a></h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
