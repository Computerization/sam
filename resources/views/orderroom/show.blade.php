{{-- 各教室的名字 --}}
@php ($names = ['C101 小教室','C102 小教室', 'C201', 'C202', 'C203', 'C204', 'C205', 'C206 大教室', 'C207 大教室', 'C3x', 'C3y', 'Dxx', 'Dyy', 'A1x 生物实验室', 'A1y 生物实验室', 'A2x 物理实验室', 'A2y 物理实验室', 'Bxx 音乐教室', 'Bxx 形体房', 'C3x 美术教室'])

@extends('layouts.semantic')
@section('title')教室预约 - @endsection

@section('content')
    <style>
        b {
            color:green; font-size:1em
        }
        #messagebox {
            margin-top: 2em;
            margin-bottom: 2em;
        }
        .ui.sticky {
            background-color: white;
            padding-bottom: 1em; !important;
        }
        #timebox {
            margin: 1em 0; !important;
        }
        .daybox {
            margin-top: 1rem !important;
        }
        .ordertablefa {
            overflow-x: scroll;
        }
        .ordertable {
            min-width: 900px;
        }
    </style>

    @if (session('alert'))
        <div class="ui container negative message">
            <div class="header">
                错误！
            </div>
            <p>{{ session('alert') }}</p>
        </div>
    @endif

    <br />
    <div class="ui container">

        {{-- System Available --}}
        @if(config('samcloud.room_order_available'))
            <div class="ui segment ordertablefa" id="noon">
                <div class="ui ordertable">
                    <div class="ui large label" id="timebox">
                        <i class="wait icon"></i> TIME PERIOD
                    </div>
                    <div class="ui two yellow item tabular menu">
                        <a class="item active" data-tab="noon"><i class="sun large icon"></i>Noon</a>
                        <a class="item" data-tab="afternoon"><i class="moon blue large icon"></i>Afternoon</a>
                    </div>
                    <div class="ui tab active" data-tab="noon">
                        <div class="ui grid equal width container center aligned daybox">
                            <div class="eight column row">
                                <div class="column">
                                    <div class="ui teal ribbon huge label">room</div>
                                </div>
                                <div class="column">
                                    <div class="ui huge label">MON </div>
                                </div>
                                <div class="column">
                                    <div class="ui huge label">TUE </div>
                                </div>
                                <div class="column">
                                    <div class="ui huge label">WED </div>
                                </div>
                                <div class="column">
                                    <div class="ui huge label">THU </div>
                                </div>
                                <div class="column">
                                    <div class="ui huge label">FRI </div>
                                </div>
                            </div>
                        </div>

                        <div class="ui grid equal width container center aligned ordertable">
                            {{-- for每行 --}}
                            @for ($room=0; $room < 13; $room++)
                                <div class="eight column row">
                                    <div class="column">{{ $names[$room] }}</div>
                                    {{-- for每列 --}}
                                    @for ($day=1; $day < 6; $day++)
                                        <div class="column">

                                                {{-- 存在预约，显示社团名字 --}}
                                                @if($order->where('time', '1')->where('room_id', $room)->where('day', $day)->first() !== null)
                                                    <a href="{{ URL::action('RoomOrderController@delete',[$room, $day, '1']) }}">
                                                        {{ $order->where('time', '1')->where('room_id', $room)->where('day', $day)->first()->organization->organization_name  }}
                                                    </a>
                                                @else
                                                    <a href="{{ URL::action('RoomOrderController@update',[$room, $day, '1']) }}">
                                                    <b class="green">Available</b>
                                                    </a>
                                                @endif

                                        </div>
                                    @endfor
                                </div>
                            @endfor
                        </div>
                    </div>

                    <div class="ui tab" data-tab="afternoon">
                        <div class="ui grid equal width container center aligned daybox">
                            <div class="eight column row">
                                <div class="column">
                                    <div class="ui teal ribbon huge label">room</div>
                                </div>
                                <div class="column">
                                    <div class="ui huge label">MON </div>
                                </div>
                                <div class="column">
                                    <div class="ui huge label">TUE </div>
                                </div>
                                <div class="column">
                                    <div class="ui huge label">WED </div>
                                </div>
                                <div class="column">
                                    <div class="ui huge label">THU </div>
                                </div>
                                <div class="column">
                                    <div class="ui huge label">FRI </div>
                                </div>
                            </div>
                        </div>

                        <div class="ui grid equal width container center aligned ordertable">
                            {{-- for每行 --}}
                            @for ($room=0; $room < 20; $room++)
                                <div class="eight column row">
                                    <div class="column">{{ $names[$room] }}</div>
                                    {{-- for每列 --}}
                                    @for ($day=1; $day < 6; $day++)
                                        <div class="column">
                                            <a href="{{ URL::action('RoomOrderController@update',[$room, $day, '2']) }}">
                                                {{-- 存在预约，显示社团名字 --}}
                                                @if($order->where('time', '2')->where('room_id', $room)->where('day', $day)->first() !== null)
                                                    {{ $order->where('time', '2')->where('room_id', $room)->where('day', $day)->first()->organization->organization_name  }}
                                                @else
                                                    <b class="green">Available</b>
                                                @endif
                                            </a>
                                        </div>
                                    @endfor
                                </div>
                            @endfor
                        </div>
                    </div>
                    {{-- Semantic-UI Tabular Script --}}
                    <script type="text/javascript">
                        $('.menu .item')
                            .tab()
                        ;
                    </script>
                </div>
            </div>
        @endif

    </div>
@endsection
