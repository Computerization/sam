@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12 col-sm-12">
        <h2>Select Your Classroom</h2>
        <p>
          <h4>Instructions</h4><br>
          All classrooms and Times are shown in table.<br>
          A box with group name indicates that the specific room and time have been ocupied.<br>
          Click on boxs with <a><b>Available</b></a> to reserve that room in certain time.<br>
          To cancel reservation, click on the box you have reserved before. (You can only cancel your own reservations.)
        </p>

        <p>&nbsp;</p>

        @if(!config('samcloud.room_order_available'))
        <div class="panel">
          <div class="panel-heading">
              <h4>Sorry, Reservation is temporarily not available.</h4>
          </div>
          <div class="panel-body">
             Please read the operation instruction above. And here are all room choice.<br>
             <h4>Reservation available from Aug. 14, 2017 20:00 UTC +8 to Aug. 16, 2017 20:00 UTC +8.</h4>
            C101
            C102
            C103
            C201
            C202
            C203
            C204
            C205
            C206
            C207
            C208
            操场（篮球场）
            操场（雨棚）
            美术室
            音乐室
            形体房
            化学实验室
            生物实验室
            物理实验室
            录音室
            A110
            A206
            校外1
            校外2
            校外3
            其他1
            其他2
            其他3</div>
        </div>
        @endif

         @if(config('samcloud.room_order_available'))
        <div class="panel panel-default">
          <div class="panel-heading"><h2>At Noon (12 A.M.)</h2></div>
          <div class="panel-body">
            <table class="table">
              <thead>
                <tr>
                  <th>Room</th>
                  <th>Mon</th>
                  <th>Tue</th>
                  <th>Wed</th>
                  <th>Thur</th>
                  <th>Fri</th>
                </tr>
              </thead>
              <tbody>
                <!-- C101 -->
                <tr>
                  <th scope="row">C楼大教室（C207/C208）1</th>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['mon', 'rm101']) }}">
                    @if(isset($order['mon']['rm101']['uid']))
                      {{ $order['mon']['rm101']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['tue', 'rm101']) }}">
                    @if(isset($order['tue']['rm101']['uid']))
                      {{ $order['tue']['rm101']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['wed', 'rm101']) }}">
                    @if(isset($order['wed']['rm101']['uid']))
                      {{ $order['wed']['rm101']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['thur', 'rm101']) }}">
                    @if(isset($order['thur']['rm101']['uid']))
                      {{ $order['thur']['rm101']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['fri', 'rm101']) }}">
                    @if(isset($order['fri']['rm101']['uid']))
                      {{ $order['fri']['rm101']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                </tr>
                <!-- C102 -->
                <tr>
                  <th scope="row">C楼大教室（C207/C208）2</th>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['mon', 'rm102']) }}">
                    @if(isset($order['mon']['rm102']['uid']))
                      {{ $order['mon']['rm102']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['tue', 'rm102']) }}">
                    @if(isset($order['tue']['rm102']['uid']))
                      {{ $order['tue']['rm102']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['wed', 'rm102']) }}">
                    @if(isset($order['wed']['rm102']['uid']))
                      {{ $order['wed']['rm102']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['thur', 'rm102']) }}">
                    @if(isset($order['thur']['rm102']['uid']))
                      {{ $order['thur']['rm102']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['fri', 'rm102']) }}">
                    @if(isset($order['fri']['rm102']['uid']))
                      {{ $order['fri']['rm102']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                </tr>

                <!-- C201 -->
                <tr>
                  <th scope="row">C楼小教室1</th>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['mon', 'rm201']) }}">
                    @if(isset($order['mon']['rm201']['uid']))
                      {{ $order['mon']['rm201']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['tue', 'rm201']) }}">
                    @if(isset($order['tue']['rm201']['uid']))
                      {{ $order['tue']['rm201']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['wed', 'rm201']) }}">
                    @if(isset($order['wed']['rm201']['uid']))
                      {{ $order['wed']['rm201']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['thur', 'rm201']) }}">
                    @if(isset($order['thur']['rm201']['uid']))
                      {{ $order['thur']['rm201']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['fri', 'rm201']) }}">
                    @if(isset($order['fri']['rm201']['uid']))
                      {{ $order['fri']['rm201']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                </tr>
                <!-- C202 -->
                <tr>
                  <th scope="row">C楼小教室2</th>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['mon', 'rm202']) }}">
                    @if(isset($order['mon']['rm202']['uid']))
                      {{ $order['mon']['rm202']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['tue', 'rm202']) }}">
                    @if(isset($order['tue']['rm202']['uid']))
                      {{ $order['tue']['rm202']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['wed', 'rm202']) }}">
                    @if(isset($order['wed']['rm202']['uid']))
                      {{ $order['wed']['rm202']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['thur', 'rm202']) }}">
                    @if(isset($order['thur']['rm202']['uid']))
                      {{ $order['thur']['rm202']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['fri', 'rm202']) }}">
                    @if(isset($order['fri']['rm202']['uid']))
                      {{ $order['fri']['rm202']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                </tr>
                <!-- C203 -->
                <tr>
                  <th scope="row">C楼小教室3</th>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['mon', 'rm203']) }}">
                    @if(isset($order['mon']['rm203']['uid']))
                      {{ $order['mon']['rm203']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['tue', 'rm203']) }}">
                    @if(isset($order['tue']['rm203']['uid']))
                      {{ $order['tue']['rm203']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['wed', 'rm203']) }}">
                    @if(isset($order['wed']['rm203']['uid']))
                      {{ $order['wed']['rm203']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['thur', 'rm203']) }}">
                    @if(isset($order['thur']['rm203']['uid']))
                      {{ $order['thur']['rm203']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['fri', 'rm203']) }}">
                    @if(isset($order['fri']['rm203']['uid']))
                      {{ $order['fri']['rm203']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                </tr>
                <!-- C204 -->
                <tr>
                  <th scope="row">C楼小教室4</th>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['mon', 'rm204']) }}">
                    @if(isset($order['mon']['rm204']['uid']))
                      {{ $order['mon']['rm204']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['tue', 'rm204']) }}">
                    @if(isset($order['tue']['rm204']['uid']))
                      {{ $order['tue']['rm204']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['wed', 'rm204']) }}">
                    @if(isset($order['wed']['rm204']['uid']))
                      {{ $order['wed']['rm204']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['thur', 'rm204']) }}">
                    @if(isset($order['thur']['rm204']['uid']))
                      {{ $order['thur']['rm204']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['fri', 'rm204']) }}">
                    @if(isset($order['fri']['rm204']['uid']))
                      {{ $order['fri']['rm204']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                </tr>
                <!-- C205 -->
                <tr>
                  <th scope="row">C楼小教室5</th>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['mon', 'rm205']) }}">
                    @if(isset($order['mon']['rm205']['uid']))
                      {{ $order['mon']['rm205']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['tue', 'rm205']) }}">
                    @if(isset($order['tue']['rm205']['uid']))
                      {{ $order['tue']['rm205']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['wed', 'rm205']) }}">
                    @if(isset($order['wed']['rm205']['uid']))
                      {{ $order['wed']['rm205']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['thur', 'rm205']) }}">
                    @if(isset($order['thur']['rm205']['uid']))
                      {{ $order['thur']['rm205']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['fri', 'rm205']) }}">
                    @if(isset($order['fri']['rm205']['uid']))
                      {{ $order['fri']['rm205']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                </tr>
                <!-- C206 -->
                <tr>
                  <th scope="row">C楼小教室6</th>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['mon', 'rm206']) }}">
                    @if(isset($order['mon']['rm206']['uid']))
                      {{ $order['mon']['rm206']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['tue', 'rm206']) }}">
                    @if(isset($order['tue']['rm206']['uid']))
                      {{ $order['tue']['rm206']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['wed', 'rm206']) }}">
                    @if(isset($order['wed']['rm206']['uid']))
                      {{ $order['wed']['rm206']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['thur', 'rm206']) }}">
                    @if(isset($order['thur']['rm206']['uid']))
                      {{ $order['thur']['rm206']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['fri', 'rm206']) }}">
                    @if(isset($order['fri']['rm206']['uid']))
                      {{ $order['fri']['rm206']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                </tr>
                <!-- C207 -->
                <tr>
                  <th scope="row">C楼小教室7</th>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['mon', 'rm207']) }}">
                    @if(isset($order['mon']['rm207']['uid']))
                      {{ $order['mon']['rm207']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['tue', 'rm207']) }}">
                    @if(isset($order['tue']['rm207']['uid']))
                      {{ $order['tue']['rm207']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['wed', 'rm207']) }}">
                    @if(isset($order['wed']['rm207']['uid']))
                      {{ $order['wed']['rm207']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['thur', 'rm207']) }}">
                    @if(isset($order['thur']['rm207']['uid']))
                      {{ $order['thur']['rm207']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['fri', 'rm207']) }}">
                    @if(isset($order['fri']['rm207']['uid']))
                      {{ $order['fri']['rm207']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                </tr>
                <!-- Art Room -->
                <tr>
                  <th scope="row">美术室</th>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['mon', 'artroom']) }}">
                    @if(isset($order['mon']['artroom']['uid']))
                      {{ $order['mon']['artroom']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['tue', 'artroom']) }}">
                    @if(isset($order['tue']['artroom']['uid']))
                      {{ $order['tue']['artroom']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['wed', 'artroom']) }}">
                    @if(isset($order['wed']['artroom']['uid']))
                      {{ $order['wed']['artroom']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['thur', 'artroom']) }}">
                    @if(isset($order['thur']['artroom']['uid']))
                      {{ $order['thur']['artroom']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['fri', 'artroom']) }}">
                    @if(isset($order['fri']['artroom']['uid']))
                      {{ $order['fri']['artroom']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                </tr>
                <!-- Dance Room -->
                <tr>
                  <th scope="row">形体房</th>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['mon', 'danceroom']) }}">
                    @if(isset($order['mon']['danceroom']['uid']))
                      {{ $order['mon']['danceroom']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['tue', 'danceroom']) }}">
                    @if(isset($order['tue']['danceroom']['uid']))
                      {{ $order['tue']['danceroom']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['wed', 'danceroom']) }}">
                    @if(isset($order['wed']['danceroom']['uid']))
                      {{ $order['wed']['danceroom']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['thur', 'danceroom']) }}">
                    @if(isset($order['thur']['danceroom']['uid']))
                      {{ $order['thur']['danceroom']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['fri', 'danceroom']) }}">
                    @if(isset($order['fri']['danceroom']['uid']))
                      {{ $order['fri']['danceroom']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                </tr>
                <!-- A110 -->
                <tr>
                  <th scope="row">A110</th>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['mon', 'a110']) }}">
                    @if(isset($order['mon']['a110']['uid']))
                      {{ $order['mon']['a110']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['tue', 'a110']) }}">
                    @if(isset($order['tue']['a110']['uid']))
                      {{ $order['tue']['a110']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['wed', 'a110']) }}">
                    @if(isset($order['wed']['a110']['uid']))
                      {{ $order['wed']['a110']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['thur', 'a110']) }}">
                    @if(isset($order['thur']['a110']['uid']))
                      {{ $order['thur']['a110']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['fri', 'a110']) }}">
                    @if(isset($order['fri']['a110']['uid']))
                      {{ $order['fri']['a110']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                </tr>
                <!-- 其他1 -->
                <tr>
                  <th scope="row">其他1</th>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['mon', 'other1']) }}">
                    @if(isset($order['mon']['other1']['uid']))
                      {{ $order['mon']['other1']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['tue', 'other1']) }}">
                    @if(isset($order['tue']['other1']['uid']))
                      {{ $order['tue']['other1']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['wed', 'other1']) }}">
                    @if(isset($order['wed']['other1']['uid']))
                      {{ $order['wed']['other1']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['thur', 'other1']) }}">
                    @if(isset($order['thur']['other1']['uid']))
                      {{ $order['thur']['other1']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['fri', 'other1']) }}">
                    @if(isset($order['fri']['other1']['uid']))
                      {{ $order['fri']['other1']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                </tr>
                <!-- 其他2 -->
                <tr>
                  <th scope="row">其他2</th>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['mon', 'other2']) }}">
                    @if(isset($order['mon']['other2']['uid']))
                      {{ $order['mon']['other2']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['tue', 'other2']) }}">
                    @if(isset($order['tue']['other2']['uid']))
                      {{ $order['tue']['other2']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['wed', 'other2']) }}">
                    @if(isset($order['wed']['other2']['uid']))
                      {{ $order['wed']['other2']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['thur', 'other2']) }}">
                    @if(isset($order['thur']['other2']['uid']))
                      {{ $order['thur']['other2']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['fri', 'other2']) }}">
                    @if(isset($order['fri']['other2']['uid']))
                      {{ $order['fri']['other2']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                </tr>
                <!-- 其他3 -->
                <tr>
                  <th scope="row">其他3</th>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['mon', 'other3']) }}">
                    @if(isset($order['mon']['other3']['uid']))
                      {{ $order['mon']['other3']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['tue', 'other3']) }}">
                    @if(isset($order['tue']['other3']['uid']))
                      {{ $order['tue']['other3']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['wed', 'other3']) }}">
                    @if(isset($order['wed']['other3']['uid']))
                      {{ $order['wed']['other3']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['thur', 'other3']) }}">
                    @if(isset($order['thur']['other3']['uid']))
                      {{ $order['thur']['other3']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['fri', 'other3']) }}">
                    @if(isset($order['fri']['other3']['uid']))
                      {{ $order['fri']['other3']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>

                <div class="panel panel-default">
                  <div class="panel-heading"><h2>After School (5 P.M.)</h2></div>
                  <div class="panel-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Room</th>
                          <th>Mon</th>
                          <th>Tue</th>
                          <th>Wed</th>
                          <th>Thur</th>
                          <th>Fri</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- C101 -->
                        <tr>
                          <th scope="row">C楼1楼小教室</th>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['mon_5pm', 'rm101']) }}">
                            @if(isset($order['mon_5pm']['rm101']['uid']))
                              {{ $order['mon_5pm']['rm101']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['tue_5pm', 'rm101']) }}">
                            @if(isset($order['tue_5pm']['rm101']['uid']))
                              {{ $order['tue_5pm']['rm101']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['wed_5pm', 'rm101']) }}">
                            @if(isset($order['wed_5pm']['rm101']['uid']))
                              {{ $order['wed_5pm']['rm101']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['thur_5pm', 'rm101']) }}">
                            @if(isset($order['thur_5pm']['rm101']['uid']))
                              {{ $order['thur_5pm']['rm101']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['fri_5pm', 'rm101']) }}">
                            @if(isset($order['fri_5pm']['rm101']['uid']))
                              {{ $order['fri_5pm']['rm101']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                        </tr>
                        <!-- C201 -->
                        <tr>
                          <th scope="row">C201</th>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['mon_5pm', 'rm201']) }}">
                            @if(isset($order['mon_5pm']['rm201']['uid']))
                              {{ $order['mon_5pm']['rm201']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['tue_5pm', 'rm201']) }}">
                            @if(isset($order['tue_5pm']['rm201']['uid']))
                              {{ $order['tue_5pm']['rm201']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['wed_5pm', 'rm201']) }}">
                            @if(isset($order['wed_5pm']['rm201']['uid']))
                              {{ $order['wed_5pm']['rm201']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['thur_5pm', 'rm201']) }}">
                            @if(isset($order['thur_5pm']['rm201']['uid']))
                              {{ $order['thur_5pm']['rm201']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['fri_5pm', 'rm201']) }}">
                            @if(isset($order['fri_5pm']['rm201']['uid']))
                              {{ $order['fri_5pm']['rm201']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                        </tr>
                        <!-- C202 -->
                        <tr>
                          <th scope="row">C202</th>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['mon_5pm', 'rm202']) }}">
                            @if(isset($order['mon_5pm']['rm202']['uid']))
                              {{ $order['mon_5pm']['rm202']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['tue_5pm', 'rm202']) }}">
                            @if(isset($order['tue_5pm']['rm202']['uid']))
                              {{ $order['tue_5pm']['rm202']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['wed_5pm', 'rm202']) }}">
                            @if(isset($order['wed_5pm']['rm202']['uid']))
                              {{ $order['wed_5pm']['rm202']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['thur_5pm', 'rm202']) }}">
                            @if(isset($order['thur_5pm']['rm202']['uid']))
                              {{ $order['thur_5pm']['rm202']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['fri_5pm', 'rm202']) }}">
                            @if(isset($order['fri_5pm']['rm202']['uid']))
                              {{ $order['fri_5pm']['rm202']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                        </tr>
                        <!-- C204 -->
                        <tr>
                          <th scope="row">C204</th>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['mon_5pm', 'rm204']) }}">
                            @if(isset($order['mon_5pm']['rm204']['uid']))
                              {{ $order['mon_5pm']['rm204']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['tue_5pm', 'rm204']) }}">
                            @if(isset($order['tue_5pm']['rm204']['uid']))
                              {{ $order['tue_5pm']['rm204']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['wed_5pm', 'rm204']) }}">
                            @if(isset($order['wed_5pm']['rm204']['uid']))
                              {{ $order['wed_5pm']['rm204']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['thur_5pm', 'rm204']) }}">
                            @if(isset($order['thur_5pm']['rm204']['uid']))
                              {{ $order['thur_5pm']['rm204']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['fri_5pm', 'rm204']) }}">
                            @if(isset($order['fri_5pm']['rm204']['uid']))
                              {{ $order['fri_5pm']['rm204']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                        </tr>

                          <!-- C206 -->
                          <tr>
                            <th scope="row">A206</th>
                            <td>
                              <a href="{{ URL::action('RoomOrderController@process',['mon_5pm', 'c206']) }}">
                              @if(isset($order['mon_5pm']['c206']['uid']))
                                {{ $order['mon_5pm']['c206']['content'] }}
                              @else
                                <b>Available</b>
                              @endif
                              </a>
                            </td>
                            <td>
                              <a href="{{ URL::action('RoomOrderController@process',['tue_5pm', 'c206']) }}">
                              @if(isset($order['tue_5pm']['c206']['uid']))
                                {{ $order['tue_5pm']['c206']['content'] }}
                              @else
                                <b>Available</b>
                              @endif
                              </a>
                            </td>
                            <td>
                              <a href="{{ URL::action('RoomOrderController@process',['wed_5pm', 'c206']) }}">
                              @if(isset($order['wed_5pm']['c206']['uid']))
                                {{ $order['wed_5pm']['c206']['content'] }}
                              @else
                                <b>Available</b>
                              @endif
                              </a>
                            </td>
                            <td>
                              <a href="{{ URL::action('RoomOrderController@process',['thur_5pm', 'c206']) }}">
                              @if(isset($order['thur_5pm']['c206']['uid']))
                                {{ $order['thur_5pm']['c206']['content'] }}
                              @else
                                <b>Available</b>
                              @endif
                              </a>
                            </td>
                            <td>
                              <a href="{{ URL::action('RoomOrderController@process',['fri_5pm', 'c206']) }}">
                              @if(isset($order['fri_5pm']['c206']['uid']))
                                {{ $order['fri_5pm']['c206']['content'] }}
                              @else
                                <b>Available</b>
                              @endif
                              </a>
                            </td>
                          </tr>

                        <!-- C103 -->
                        <tr>
                          <th scope="row">C楼小教室1</th>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['mon_5pm', 'rm103']) }}">
                            @if(isset($order['mon_5pm']['rm103']['uid']))
                              {{ $order['mon_5pm']['rm103']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['tue_5pm', 'rm103']) }}">
                            @if(isset($order['tue_5pm']['rm103']['uid']))
                              {{ $order['tue_5pm']['rm103']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['wed_5pm', 'rm103']) }}">
                            @if(isset($order['wed_5pm']['rm103']['uid']))
                              {{ $order['wed_5pm']['rm103']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['thur_5pm', 'rm103']) }}">
                            @if(isset($order['thur_5pm']['rm103']['uid']))
                              {{ $order['thur_5pm']['rm103']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['fri_5pm', 'rm103']) }}">
                            @if(isset($order['fri_5pm']['rm103']['uid']))
                              {{ $order['fri_5pm']['rm103']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                        </tr>

                        <!-- C203 -->
                        <tr>
                          <th scope="row">C楼小教室2</th>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['mon_5pm', 'rm203']) }}">
                            @if(isset($order['mon_5pm']['rm203']['uid']))
                              {{ $order['mon_5pm']['rm203']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['tue_5pm', 'rm203']) }}">
                            @if(isset($order['tue_5pm']['rm203']['uid']))
                              {{ $order['tue_5pm']['rm203']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['wed_5pm', 'rm203']) }}">
                            @if(isset($order['wed_5pm']['rm203']['uid']))
                              {{ $order['wed_5pm']['rm203']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['thur_5pm', 'rm203']) }}">
                            @if(isset($order['thur_5pm']['rm203']['uid']))
                              {{ $order['thur_5pm']['rm203']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['fri_5pm', 'rm203']) }}">
                            @if(isset($order['fri_5pm']['rm203']['uid']))
                              {{ $order['fri_5pm']['rm203']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                        </tr>
                        <!-- C205 -->
                        <tr>
                          <th scope="row">C楼小教室3</th>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['mon_5pm', 'rm205']) }}">
                            @if(isset($order['mon_5pm']['rm205']['uid']))
                              {{ $order['mon_5pm']['rm205']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['tue_5pm', 'rm205']) }}">
                            @if(isset($order['tue_5pm']['rm205']['uid']))
                              {{ $order['tue_5pm']['rm205']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['wed_5pm', 'rm205']) }}">
                            @if(isset($order['wed_5pm']['rm205']['uid']))
                              {{ $order['wed_5pm']['rm205']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['thur_5pm', 'rm205']) }}">
                            @if(isset($order['thur_5pm']['rm205']['uid']))
                              {{ $order['thur_5pm']['rm205']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['fri_5pm', 'rm205']) }}">
                            @if(isset($order['fri_5pm']['rm205']['uid']))
                              {{ $order['fri_5pm']['rm205']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                        </tr>
                        <!-- C207 -->
                        <tr>
                          <th scope="row">C楼大教室（C207/C208）1</th>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['mon_5pm', 'rm207']) }}">
                            @if(isset($order['mon_5pm']['rm207']['uid']))
                              {{ $order['mon_5pm']['rm207']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['tue_5pm', 'rm207']) }}">
                            @if(isset($order['tue_5pm']['rm207']['uid']))
                              {{ $order['tue_5pm']['rm207']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['wed_5pm', 'rm207']) }}">
                            @if(isset($order['wed_5pm']['rm207']['uid']))
                              {{ $order['wed_5pm']['rm207']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['thur_5pm', 'rm207']) }}">
                            @if(isset($order['thur_5pm']['rm207']['uid']))
                              {{ $order['thur_5pm']['rm207']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['fri_5pm', 'rm207']) }}">
                            @if(isset($order['fri_5pm']['rm207']['uid']))
                              {{ $order['fri_5pm']['rm207']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                        </tr>
                        <!-- C208 -->
                        <tr>
                          <th scope="row">C楼大教室（C207/C208）2</th>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['mon_5pm', 'rm208']) }}">
                            @if(isset($order['mon_5pm']['rm208']['uid']))
                              {{ $order['mon_5pm']['rm208']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['tue_5pm', 'rm208']) }}">
                            @if(isset($order['tue_5pm']['rm208']['uid']))
                              {{ $order['tue_5pm']['rm208']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['wed_5pm', 'rm208']) }}">
                            @if(isset($order['wed_5pm']['rm208']['uid']))
                              {{ $order['wed_5pm']['rm208']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['thur_5pm', 'rm208']) }}">
                            @if(isset($order['thur_5pm']['rm208']['uid']))
                              {{ $order['thur_5pm']['rm208']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['fri_5pm', 'rm208']) }}">
                            @if(isset($order['fri_5pm']['rm208']['uid']))
                              {{ $order['fri_5pm']['rm208']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                        </tr>
                        <!-- Basketball Field -->
                        <tr>
                          <th scope="row">操场（篮球场）</th>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['mon_5pm', 'basketballfield']) }}">
                            @if(isset($order['mon_5pm']['basketballfield']['uid']))
                              {{ $order['mon_5pm']['basketballfield']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['tue_5pm', 'basketballfield']) }}">
                            @if(isset($order['tue_5pm']['basketballfield']['uid']))
                              {{ $order['tue_5pm']['basketballfield']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['wed_5pm', 'basketballfield']) }}">
                            @if(isset($order['wed_5pm']['basketballfield']['uid']))
                              {{ $order['wed_5pm']['basketballfield']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['thur_5pm', 'basketballfield']) }}">
                            @if(isset($order['thur_5pm']['basketballfield']['uid']))
                              {{ $order['thur_5pm']['basketballfield']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['fri_5pm', 'basketballfield']) }}">
                            @if(isset($order['fri_5pm']['basketballfield']['uid']))
                              {{ $order['fri_5pm']['basketballfield']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                        </tr>
                        <!-- Indoor Playground -->
                        <tr>
                          <th scope="row">操场（雨棚）</th>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['mon_5pm', 'indoorplayground']) }}">
                            @if(isset($order['mon_5pm']['indoorplayground']['uid']))
                              {{ $order['mon_5pm']['indoorplayground']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['tue_5pm', 'indoorplayground']) }}">
                            @if(isset($order['tue_5pm']['indoorplayground']['uid']))
                              {{ $order['tue_5pm']['indoorplayground']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['wed_5pm', 'indoorplayground']) }}">
                            @if(isset($order['wed_5pm']['indoorplayground']['uid']))
                              {{ $order['wed_5pm']['indoorplayground']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['thur_5pm', 'indoorplayground']) }}">
                            @if(isset($order['thur_5pm']['indoorplayground']['uid']))
                              {{ $order['thur_5pm']['indoorplayground']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['fri_5pm', 'indoorplayground']) }}">
                            @if(isset($order['fri_5pm']['indoorplayground']['uid']))
                              {{ $order['fri_5pm']['indoorplayground']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                        </tr>
                        <!-- Art Room -->
                        <tr>
                          <th scope="row">美术室</th>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['mon_5pm', 'artroom']) }}">
                            @if(isset($order['mon_5pm']['artroom']['uid']))
                              {{ $order['mon_5pm']['artroom']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['tue_5pm', 'artroom']) }}">
                            @if(isset($order['tue_5pm']['artroom']['uid']))
                              {{ $order['tue_5pm']['artroom']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['wed_5pm', 'artroom']) }}">
                            @if(isset($order['wed_5pm']['artroom']['uid']))
                              {{ $order['wed_5pm']['artroom']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['thur_5pm', 'artroom']) }}">
                            @if(isset($order['thur_5pm']['artroom']['uid']))
                              {{ $order['thur_5pm']['artroom']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['fri_5pm', 'artroom']) }}">
                            @if(isset($order['fri_5pm']['artroom']['uid']))
                              {{ $order['fri_5pm']['artroom']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                        </tr>
                        <!-- Music Room -->
                        <tr>
                          <th scope="row">音乐室</th>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['mon_5pm', 'musicroom']) }}">
                            @if(isset($order['mon_5pm']['musicroom']['uid']))
                              {{ $order['mon_5pm']['musicroom']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['tue_5pm', 'musicroom']) }}">
                            @if(isset($order['tue_5pm']['musicroom']['uid']))
                              {{ $order['tue_5pm']['musicroom']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['wed_5pm', 'musicroom']) }}">
                            @if(isset($order['wed_5pm']['musicroom']['uid']))
                              {{ $order['wed_5pm']['musicroom']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['thur_5pm', 'musicroom']) }}">
                            @if(isset($order['thur_5pm']['musicroom']['uid']))
                              {{ $order['thur_5pm']['musicroom']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['fri_5pm', 'musicroom']) }}">
                            @if(isset($order['fri_5pm']['musicroom']['uid']))
                              {{ $order['fri_5pm']['musicroom']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                        </tr>
                        <!-- Dance Room -->
                        <tr>
                          <th scope="row">形体房</th>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['mon_5pm', 'danceroom']) }}">
                            @if(isset($order['mon_5pm']['danceroom']['uid']))
                              {{ $order['mon_5pm']['danceroom']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['tue_5pm', 'danceroom']) }}">
                            @if(isset($order['tue_5pm']['danceroom']['uid']))
                              {{ $order['tue_5pm']['danceroom']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['wed_5pm', 'danceroom']) }}">
                            @if(isset($order['wed_5pm']['danceroom']['uid']))
                              {{ $order['wed_5pm']['danceroom']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['thur_5pm', 'danceroom']) }}">
                            @if(isset($order['thur_5pm']['danceroom']['uid']))
                              {{ $order['thur_5pm']['danceroom']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['fri_5pm', 'danceroom']) }}">
                            @if(isset($order['fri_5pm']['danceroom']['uid']))
                              {{ $order['fri_5pm']['danceroom']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                        </tr>
                        <!-- Chem Lab -->
                        <tr>
                          <th scope="row">化学实验室</th>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['mon_5pm', 'chemlab']) }}">
                            @if(isset($order['mon_5pm']['chemlab']['uid']))
                              {{ $order['mon_5pm']['chemlab']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['tue_5pm', 'chemlab']) }}">
                            @if(isset($order['tue_5pm']['chemlab']['uid']))
                              {{ $order['tue_5pm']['chemlab']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['wed_5pm', 'chemlab']) }}">
                            @if(isset($order['wed_5pm']['chemlab']['uid']))
                              {{ $order['wed_5pm']['chemlab']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['thur_5pm', 'chemlab']) }}">
                            @if(isset($order['thur_5pm']['chemlab']['uid']))
                              {{ $order['thur_5pm']['chemlab']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['fri_5pm', 'chemlab']) }}">
                            @if(isset($order['fri_5pm']['chemlab']['uid']))
                              {{ $order['fri_5pm']['chemlab']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                        </tr>
                        <!-- Bio Lab -->
                        <tr>
                          <th scope="row">生物实验室</th>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['mon_5pm', 'biolab']) }}">
                            @if(isset($order['mon_5pm']['biolab']['uid']))
                              {{ $order['mon_5pm']['biolab']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['tue_5pm', 'biolab']) }}">
                            @if(isset($order['tue_5pm']['biolab']['uid']))
                              {{ $order['tue_5pm']['biolab']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['wed_5pm', 'biolab']) }}">
                            @if(isset($order['wed_5pm']['biolab']['uid']))
                              {{ $order['wed_5pm']['biolab']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['thur_5pm', 'biolab']) }}">
                            @if(isset($order['thur_5pm']['biolab']['uid']))
                              {{ $order['thur_5pm']['biolab']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['fri_5pm', 'biolab']) }}">
                            @if(isset($order['fri_5pm']['biolab']['uid']))
                              {{ $order['fri_5pm']['biolab']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                        </tr>

                          <!-- Phys Lab -->
                          <tr>
                            <th scope="row">物理实验室</th>
                            <td>
                              <a href="{{ URL::action('RoomOrderController@process',['mon_5pm', 'physlab']) }}">
                              @if(isset($order['mon_5pm']['physlab']['uid']))
                                {{ $order['mon_5pm']['physlab']['content'] }}
                              @else
                                <b>Available</b>
                              @endif
                              </a>
                            </td>
                            <td>
                              <a href="{{ URL::action('RoomOrderController@process',['tue_5pm', 'physlab']) }}">
                              @if(isset($order['tue_5pm']['physlab']['uid']))
                                {{ $order['tue_5pm']['physlab']['content'] }}
                              @else
                                <b>Available</b>
                              @endif
                              </a>
                            </td>
                            <td>
                              <a href="{{ URL::action('RoomOrderController@process',['wed_5pm', 'physlab']) }}">
                              @if(isset($order['wed_5pm']['physlab']['uid']))
                                {{ $order['wed_5pm']['physlab']['content'] }}
                              @else
                                <b>Available</b>
                              @endif
                              </a>
                            </td>
                            <td>
                              <a href="{{ URL::action('RoomOrderController@process',['thur_5pm', 'physlab']) }}">
                              @if(isset($order['thur_5pm']['physlab']['uid']))
                                {{ $order['thur_5pm']['physlab']['content'] }}
                              @else
                                <b>Available</b>
                              @endif
                              </a>
                            </td>
                            <td>
                              <a href="{{ URL::action('RoomOrderController@process',['fri_5pm', 'physlab']) }}">
                              @if(isset($order['fri_5pm']['physlab']['uid']))
                                {{ $order['fri_5pm']['physlab']['content'] }}
                              @else
                                <b>Available</b>
                              @endif
                              </a>
                            </td>
                          </tr>
                        <!-- Recording Room -->
                        <tr>
                          <th scope="row">录音室</th>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['mon_5pm', 'recordroom']) }}">
                            @if(isset($order['mon_5pm']['recordroom']['uid']))
                              {{ $order['mon_5pm']['recordroom']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['tue_5pm', 'recordroom']) }}">
                            @if(isset($order['tue_5pm']['recordroom']['uid']))
                              {{ $order['tue_5pm']['recordroom']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['wed_5pm', 'recordroom']) }}">
                            @if(isset($order['wed_5pm']['recordroom']['uid']))
                              {{ $order['wed_5pm']['recordroom']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['thur_5pm', 'recordroom']) }}">
                            @if(isset($order['thur_5pm']['recordroom']['uid']))
                              {{ $order['thur_5pm']['recordroom']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['fri_5pm', 'recordroom']) }}">
                            @if(isset($order['fri_5pm']['recordroom']['uid']))
                              {{ $order['fri_5pm']['recordroom']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                        </tr>
                        <!-- A110 -->
                        <tr>
                          <th scope="row">A110</th>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['mon_5pm', 'a110']) }}">
                            @if(isset($order['mon_5pm']['a110']['uid']))
                              {{ $order['mon_5pm']['a110']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['tue_5pm', 'a110']) }}">
                            @if(isset($order['tue_5pm']['a110']['uid']))
                              {{ $order['tue_5pm']['a110']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['wed_5pm', 'a110']) }}">
                            @if(isset($order['wed_5pm']['a110']['uid']))
                              {{ $order['wed_5pm']['a110']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['thur_5pm', 'a110']) }}">
                            @if(isset($order['thur_5pm']['a110']['uid']))
                              {{ $order['thur_5pm']['a110']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['fri_5pm', 'a110']) }}">
                            @if(isset($order['fri_5pm']['a110']['uid']))
                              {{ $order['fri_5pm']['a110']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                        </tr>
                        <!-- 校外1 -->
                        <tr>
                          <th scope="row">校外1</th>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['mon_5pm', 'outsideschool1']) }}">
                            @if(isset($order['mon_5pm']['outsideschool1']['uid']))
                              {{ $order['mon_5pm']['outsideschool1']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['tue_5pm', 'outsideschool1']) }}">
                            @if(isset($order['tue_5pm']['outsideschool1']['uid']))
                              {{ $order['tue_5pm']['outsideschool1']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['wed_5pm', 'outsideschool1']) }}">
                            @if(isset($order['wed_5pm']['outsideschool1']['uid']))
                              {{ $order['wed_5pm']['outsideschool1']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['thur_5pm', 'outsideschool1']) }}">
                            @if(isset($order['thur_5pm']['outsideschool1']['uid']))
                              {{ $order['thur_5pm']['outsideschool1']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['fri_5pm', 'outsideschool1']) }}">
                            @if(isset($order['fri_5pm']['outsideschool1']['uid']))
                              {{ $order['fri_5pm']['outsideschool1']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                        </tr>
                        <!-- 校外2 -->
                        <tr>
                          <th scope="row">校外2</th>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['mon_5pm', 'outsideschool2']) }}">
                            @if(isset($order['mon_5pm']['outsideschool2']['uid']))
                              {{ $order['mon_5pm']['outsideschool2']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['tue_5pm', 'outsideschool2']) }}">
                            @if(isset($order['tue_5pm']['outsideschool2']['uid']))
                              {{ $order['tue_5pm']['outsideschool2']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['wed_5pm', 'outsideschool2']) }}">
                            @if(isset($order['wed_5pm']['outsideschool2']['uid']))
                              {{ $order['wed_5pm']['outsideschool2']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['thur_5pm', 'outsideschool2']) }}">
                            @if(isset($order['thur_5pm']['outsideschool2']['uid']))
                              {{ $order['thur_5pm']['outsideschool2']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['fri_5pm', 'outsideschool2']) }}">
                            @if(isset($order['fri_5pm']['outsideschool2']['uid']))
                              {{ $order['fri_5pm']['outsideschool2']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                        </tr>
                        <!-- 校外3 -->
                        <tr>
                          <th scope="row">校外3</th>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['mon_5pm', 'outsideschool3']) }}">
                            @if(isset($order['mon_5pm']['outsideschool3']['uid']))
                              {{ $order['mon_5pm']['outsideschool3']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['tue_5pm', 'outsideschool3']) }}">
                            @if(isset($order['tue_5pm']['outsideschool3']['uid']))
                              {{ $order['tue_5pm']['outsideschool3']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['wed_5pm', 'outsideschool3']) }}">
                            @if(isset($order['wed_5pm']['outsideschool3']['uid']))
                              {{ $order['wed_5pm']['outsideschool3']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['thur_5pm', 'outsideschool3']) }}">
                            @if(isset($order['thur_5pm']['outsideschool3']['uid']))
                              {{ $order['thur_5pm']['outsideschool3']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['fri_5pm', 'outsideschool3']) }}">
                            @if(isset($order['fri_5pm']['outsideschool3']['uid']))
                              {{ $order['fri_5pm']['outsideschool3']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                        </tr>
                        <!-- 其他1 -->
                        <tr>
                          <th scope="row">其他1</th>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['mon_5pm', 'other1']) }}">
                            @if(isset($order['mon_5pm']['other1']['uid']))
                              {{ $order['mon_5pm']['other1']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['tue_5pm', 'other1']) }}">
                            @if(isset($order['tue_5pm']['other1']['uid']))
                              {{ $order['tue_5pm']['other1']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['wed_5pm', 'other1']) }}">
                            @if(isset($order['wed_5pm']['other1']['uid']))
                              {{ $order['wed_5pm']['other1']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['thur_5pm', 'other1']) }}">
                            @if(isset($order['thur_5pm']['other1']['uid']))
                              {{ $order['thur_5pm']['other1']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['fri_5pm', 'other1']) }}">
                            @if(isset($order['fri_5pm']['other1']['uid']))
                              {{ $order['fri_5pm']['other1']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                        </tr>
                        <!-- 其他2 -->
                        <tr>
                          <th scope="row">其他2</th>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['mon_5pm', 'other2']) }}">
                            @if(isset($order['mon_5pm']['other2']['uid']))
                              {{ $order['mon_5pm']['other2']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['tue_5pm', 'other2']) }}">
                            @if(isset($order['tue_5pm']['other2']['uid']))
                              {{ $order['tue_5pm']['other2']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['wed_5pm', 'other2']) }}">
                            @if(isset($order['wed_5pm']['other2']['uid']))
                              {{ $order['wed_5pm']['other2']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['thur_5pm', 'other2']) }}">
                            @if(isset($order['thur_5pm']['other2']['uid']))
                              {{ $order['thur_5pm']['other2']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['fri_5pm', 'other2']) }}">
                            @if(isset($order['fri_5pm']['other2']['uid']))
                              {{ $order['fri_5pm']['other2']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                        </tr>
                        <!-- 其他3 -->
                        <tr>
                          <th scope="row">其他3</th>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['mon_5pm', 'other3']) }}">
                            @if(isset($order['mon_5pm']['other3']['uid']))
                              {{ $order['mon_5pm']['other3']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['tue_5pm', 'other3']) }}">
                            @if(isset($order['tue_5pm']['other3']['uid']))
                              {{ $order['tue_5pm']['other3']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['wed_5pm', 'other3']) }}">
                            @if(isset($order['wed_5pm']['other3']['uid']))
                              {{ $order['wed_5pm']['other3']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['thur_5pm', 'other3']) }}">
                            @if(isset($order['thur_5pm']['other3']['uid']))
                              {{ $order['thur_5pm']['other3']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{ URL::action('RoomOrderController@process',['fri_5pm', 'other3']) }}">
                            @if(isset($order['fri_5pm']['other3']['uid']))
                              {{ $order['fri_5pm']['other3']['content'] }}
                            @else
                              <b>Available</b>
                            @endif
                            </a>
                          </td>
                        </tr>

                      </tbody>
                    </table>
                  </div>
                </div>
                 @endif


      </div>

    </div>
</div>
@endsection
