@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12 col-sm-12">
        <h4>Select Your Classroom</h4>
        <p>
          Instructions:<br>
          All classrooms and Times are shown in table.<br>
          A box with group name indicates that the specific room and time have been ocupied.<br>
          Click on boxs with <a><b>Available</b></a> to reserve that room in certain time.<br>
          To cancel reservation, click on the box you have reserved before. (You can only cancel your own reservations.)
        </p>
        <div class="panel">
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
                <tr>
                  <th scope="row">101</th>
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
                <tr>
                  <th scope="row">102</th>
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
                <tr>
                  <th scope="row">103</th>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['mon', 'rm103']) }}">
                    @if(isset($order['mon']['rm103']['uid']))
                      {{ $order['mon']['rm103']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['tue', 'rm103']) }}">
                    @if(isset($order['tue']['rm103']['uid']))
                      {{ $order['tue']['rm103']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['wed', 'rm103']) }}">
                    @if(isset($order['wed']['rm103']['uid']))
                      {{ $order['wed']['rm103']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['thur', 'rm103']) }}">
                    @if(isset($order['thur']['rm103']['uid']))
                      {{ $order['thur']['rm103']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                  <td>
                    <a href="{{ URL::action('RoomOrderController@process',['fri', 'rm103']) }}">
                    @if(isset($order['fri']['rm103']['uid']))
                      {{ $order['fri']['rm103']['content'] }}
                    @else
                      <b>Available</b>
                    @endif
                    </a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">201</th>
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
                <tr>
                  <th scope="row">202</th>
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
                <tr>
                  <th scope="row">203</th>
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
                <tr>
                  <th scope="row">204</th>
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
                <tr>
                  <th scope="row">205</th>
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
                <tr>
                  <th scope="row">206</th>
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
                <tr>
                  <th scope="row">207</th>
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

              </tbody>
            </table>
          </div>
        </div>

      </div>

    </div>
</div>
@endsection
