@extends('layouts.control_center')

@section('control_content')
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Dashboard</h4></div>

                <div class="panel-body">
                    <h4>Welcome To SAM Online Collaboration Platform.</h4>
                    <p>This is a beta version software, bugs may exist.</p>
                    <hr>
                    <a href="{{ url('/auction') }}"><h4>2017 Why Charity 作品拍卖通道</h4></a>
                </div>
            </div>
@endsection
