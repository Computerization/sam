<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('simditor/styles/simditor.css') }}" type="text/css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/Buttons/2.0.0/css/buttons.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <style>
      a:hover {
        text-decoration: none;
      }
    </style>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                      @if (!Auth::guest())
                        <li><a href="{{ url('group') }}">{{ trans('nav.group') }}</a></li>
                        <li><a href="{{ url('vote') }}">{{ trans('nav.vote') }}</a></li>
                        <li><a href="{{ url('order/room') }}">{{ trans('nav.reservation') }}</a></li>
                      @endif
                      <li><a href="{{ url('org') }}">{{ trans('org.org') }}</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">{{ trans('login.login') }}</a></li>
                            <li><a href="{{ route('register') }}">{{ trans('login.register') }}</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                  <li>
                                    <a href="{{ URL::action('HomeController@index') }}">{{ trans('nav.dashboard') }}</a>
                                  </li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ trans('nav.logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
        <!-- <p>&nbsp;</p> -->
        <div class="container">
          <div class="col-md-4">
            <p>Computerization Proudly Present. - <a href="http://4.wflmssam.sinaapp.com" target="_blank">About Us</a></p>
          </div>
          <div class="col-md-4">

          </div>
          <div class="col-md-4">
            <p>App Version 20170831 Release Candidate</p>
          </div>
        </div>
        <!-- <p>&nbsp;</p> -->
        <p>&nbsp;</p>

    </div>

    <!-- Scripts -->
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('simditor/scripts/module.min.js') }}"></script>
    <script src="{{ asset('simditor/scripts/hotkeys.min.js') }}"></script>
    <script src="{{ asset('simditor/scripts/uploader.min.js') }}"></script>
    <script src="{{ asset('simditor/scripts/simditor.min.js') }}"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.bootcss.com/Buttons/2.0.0/js/buttons.min.js"></script>
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
    @yield('scripts')
</body>
</html>
