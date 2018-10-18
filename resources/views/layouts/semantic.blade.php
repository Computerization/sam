<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>@yield('title')SAM</title>

    {{-- Required meta attributes for Cross-Browser Support --}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- Required meta attributes ends --}}

    {{-- CSRF Token (Required by Laravel to authenticate users) --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- CSRF Token Field ends--}}

    {{-- Semantic-UI --}}
    <link href="{{ asset('semantic/semantic.min.css') }}" rel="stylesheet">
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('semantic/semantic.min.js') }}"></script>
    {{-- Semantic-UI ends --}}

    <link href="https://cdn.bootcss.com/semantic-ui-calendar/0.0.8/calendar.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet">

    {{-- simditor --}}
    <link href="{{ asset('simditor/styles/simditor.css') }}" type="text/css" rel="stylesheet">
    {{-- simditor ends --}}


    {{-- Switch mobile and desktop --}}
    <style>
        #desktop-nav {
          display: flex; !important;
        }

        #mobile-nav {
          display: none; !important;
        }

        @media only screen and (max-width: 700px) {
          #desktop-nav {
            display: none; !important;
          }

          #mobile-nav {
            display: flex; !important;
          }
      }

      .content-preview {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
      }

      p {
        line-height: 2em; !important;
      }

      .content-expansion p {
        line-height: 2em; !important;
      }
    </style>

</head>
<body>
    <div class="ui vertical inverted sidebar menu left">
        <a href="{{ url('/') }}" class="header item">
            <img src="/images/logo.svg" width="64" height="64" alt="SAM">
        </a>

        {{-- Only logged in users can view --}}
        @if (!Auth::guest() && Auth::user()->group >= 0)
            {{-- 投票 --}}
            <a href="{{ url('vote') }}" class="item">
                <i class="chart bar icon"></i>{{ trans('nav.vote') }}
            </a>
            {{-- 预约 --}}
            <a href="{{ url('order/room') }}" class="item">
                <i class="calendar icon"></i>{{ trans('nav.reservation') }}
            </a>
            {{-- 社团 --}}
            <a href="{{ url('org') }}" class="item">
                <i class="coffee icon"></i>{{ trans('org.org') }}
            </a>
            {{-- 社团 --}}
            <a href="{{ url('class') }}" class="item">
                <i class="coffee icon"></i>班级
            </a>
        @endif

        {{-- <div class="right menu"> --}}
        {{-- Only non-logged in users can view --}}
        @if (Auth::guest())
            {{-- 登录 --}}
            <a class="item" href="{{ route('login') }}">
                <i class="sign in alternate icon"></i>{{ trans('login.login') }}
            </a>
            {{-- 注册 --}}
            <a class="item" href="{{ route('register') }}">
                <i class="user plus icon"></i>{{ trans('login.register') }}
            </a>
        @else
            <div class="item">
            </div>
            <div class="item">
                {{ Auth::user()->name }}
            </div>
            @if (Auth::user()->group >= 0)
                {{-- SWFLA students only：用户中心 --}}
                <a class="item" href="{{ URL::action('HomeController@index') }}">
                    <i class="user icon"></i>{{ trans('nav.dashboard') }}
                </a>
                {{-- SWFLA students only：个人日历 --}}
                <a class="item" href="{{ URL::action('UserController@show_mycalendar') }}">
                    <i class="calendar icon"></i>我的日历
                </a>
            @endif
            {{-- 登出（通过csrf_field form进行） --}}
            <a class="item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="sign out alternate icon"></i>{{ trans('nav.logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        @endif
    </div>
    <div class="pusher">
        <div class="ui attached stackable menu">
            {{-- Mobile View --}}
            <div class="ui container" id="mobile-nav">
              <a class="toc header item">
                <i class="sidebar icon"></i>
                  <img src="/images/logo.svg" width="30" height="30" alt="SAM">
                  &nbsp;&nbsp;SAM
              </a>
            </div>
            {{-- Deskptop View --}}
            <div class="ui container" id="desktop-nav">
                <a href="{{ url('/') }}" class="header item">
                    <img src="/images/logo.svg" width="30" height="30" alt="SAM">
                    &nbsp;&nbsp;SAM
                </a>

                {{-- Only logged in users can view --}}
                @if (!Auth::guest() && Auth::user()->group >= 0)
                    {{-- 投票 --}}
                    <a href="{{ url('vote') }}" class="item">
                        <i class="chart bar icon"></i>{{ trans('nav.vote') }}
                    </a>
                    {{-- 预约 --}}
                    <a href="{{ url('order/room') }}" class="item">
                        <i class="calendar icon"></i>{{ trans('nav.reservation') }}
                    </a>
                    {{-- 社团 --}}
                    <a href="{{ url('org') }}" class="item">
                        <i class="coffee icon"></i>{{ trans('org.org') }}
                    </a>
                    {{-- 班级 --}}
                    <a href="{{ url('class') }}" class="item">
                        <i class="coffee icon"></i>班级
                    </a>
                @endif

                <div class="right menu">
                    {{-- Only non-logged in users can view --}}
                    @if (Auth::guest())
                        {{-- 登录 --}}
                        <a class="item" href="{{ route('login') }}">
                            <i class="sign in alternate icon"></i>{{ trans('login.login') }}
                        </a>
                        {{-- 注册 --}}
                        <a class="item" href="{{ route('register') }}">
                            <i class="user plus icon"></i>{{ trans('login.register') }}
                        </a>
                    @else
                        <div class="ui simple dropdown item">
                            {{ Auth::user()->name }}<i class="dropdown icon"></i>
                            <div class="menu" style="font-size:0.8em;">
                                @if (Auth::user()->group >= 0)
                                    {{-- SWFLA students only：用户中心 --}}
                                    <a class="item" href="{{ URL::action('HomeController@index') }}">
                                        <i class="user icon"></i>{{ trans('nav.dashboard') }}
                                    </a>
                                    {{-- SWFLA students only：个人日历 --}}
                                    <a class="item" href="{{ URL::action('UserController@show_mycalendar') }}">
                                        <i class="calendar icon"></i>我的日历
                                    </a>
                                @endif
                                {{-- 登出（通过csrf_field form进行） --}}
                                <a class="item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <i class="sign out alternate icon"></i>{{ trans('nav.logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        @yield('content')
        <br />
        <div class="ui three column stackable grid container">
            <div class="center aligned column" style="padding-bottom:0!important;">
                <div class="ui basic segment" style="padding-bottom:0!important;">
                    <span style="font-weight:bold;font-size:1.05em">联系我们</span>
                    <br>
                    <span>微信公众号：Computerization</span>
                </div>
            </div>
            <div class="center aligned column" style="padding-bottom:0!important;">
                <div class="ui basic segment"  style="padding-bottom:0!important;">
                    <span style="font-weight:bold;font-size:1.05em">开放源代码</span>
                    <br>
                    <a href="https://github.com/computerization/sam">
                        <i class="fitted github icon"></i>: Computerization/SAM
                    </a>
                </div>
            </div>
            <div class="center aligned column">
                <div class="ui basic segment">
                    <p>
                        <span style="font-weight:bold;font-size:1.05em">SAM v2018.06</span><br>
                        <i class="copyright outline icon"></i>Computerization 2014-2018
                    </p>
                </div>
            </div>
        </div>
    </div>


    <!-- Scripts -->

    <!-- Moment.js -->
    <script src="https://cdn.bootcss.com/moment.js/2.22.1/moment-with-locales.min.js"></script>
    <script src="https://cdn.bootcss.com/semantic-ui-calendar/0.0.8/calendar.min.js"></script>
    <script src="https://cdn.bootcss.com/fullcalendar/3.9.0/fullcalendar.min.js"></script>

    {{-- simditor Scripts Here --}}
    <script src="{{ asset('simditor/scripts/module.min.js') }}"></script>
    <script src="{{ asset('simditor/scripts/hotkeys.min.js') }}"></script>
    <script src="{{ asset('simditor/scripts/uploader.min.js') }}"></script>
    <script src="{{ asset('simditor/scripts/simditor.min.js') }}"></script>
    {{-- simditor Scripts Here --}}

    <script src="https://cdn.bootcss.com/marked/0.4.0/marked.min.js"></script>

    {{-- Page Custom Scripts Here --}}
    @yield('scripts')
    {{-- Page Custom Scripts Ends --}}

    {{-- Toggle sidebar when mobile --}}
    <script>
        $(document).ready(function() {
            // create sidebar and attach to menu open
            $('.ui.sidebar').sidebar('attach events', '.toc.item');
        });
    </script>

</body>
</html>
