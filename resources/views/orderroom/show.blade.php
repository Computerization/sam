{{-- 各教室的名字 --}}
@php ($names = ['A206 大教室', 'C101 小教室','C102 小教室', 'C201', 'C202', 'C203', 'C204', 'C206', 'C207 大教室', 'C208 大教室', 'C302', 'C303', 'C308', 'D101', 'D102', 'A101 生化实验室', 'A103 生化实验室', 'A104 科学实验室', 'A201 物理实验室', 'A203 物理实验室', 'B楼 音乐教室', 'B楼 形体房', 'C楼 美术教室'])

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

        @unless (config('samcloud.room_order_available'))
            <div class="ui negative message">
                <div class="header">
                    系统未开启
                </div>
                <p>请联系管理员或学生会社团部咨询开放时间</p>
            </div>
        @endunless

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
                            @for ($room=0; $room < 23; $room++)
                                <div class="eight column row">
                                    <div class="column">{{ $names[$room] }}</div>
                                    {{-- for每列 --}}
                                    @for ($day=1; $day < 6; $day++)
                                        <div class="column">

                                                {{-- 存在预约，显示社团名字 --}}
                                                @if($order->where('time', '2')->where('room_id', $room)->where('day', $day)->first() !== null)
                                                    <a href="{{ URL::action('RoomOrderController@delete',[$room, $day, '2']) }}">
                                                        {{ $order->where('time', '2')->where('room_id', $room)->where('day', $day)->first()->organization->organization_name  }}
                                                    </a>
                                                @else
                                                    <a href="{{ URL::action('RoomOrderController@update',[$room, $day, '2']) }}">
                                                        <b class="green">Available</b>
                                                    </a>
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
