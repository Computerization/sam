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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{ asset('simditor/styles/simditor.css') }}" type="text/css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/Buttons/2.0.0/css/buttons.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/bootstrap-daterangepicker/2.1.25/daterangepicker.min.css" rel="stylesheet">
    <style>
      a:hover {
        text-decoration: none;
      }

      .hideoverflow {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 3;
        overflow: hidden;
      }
      .footer {
        margin-top: 1em;
      }
    </style>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-light bg-light navbar-expand-lg">
            <div class="container">
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}" style="display: inline;">
                      <img alt="SAM" style="position:relative;display: inline;" src="/images/logo.svg" width="40">
                      <span class="navbar-text" style="position:relative;left:10px;">{{ config('app.name', 'Laravel') }}</span>
                    </a>
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                      @if (!Auth::guest() && Auth::user()->group >= 0)
                        <!-- <li><a href="{{ url('vote/group') }}">{{ trans('nav.group') }}</a></li> -->
                        <li class="nav-item"><a class="nav-link" href="{{ url('vote') }}">{{ trans('nav.vote') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('resource') }}">{{ trans('nav.reservation') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('org') }}">{{ trans('org.org') }}</a></li>
                      @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ trans('login.login') }}</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{ trans('login.register') }}</a></li>
                        @else
                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                  @if (Auth::user()->group >= 0)
                                    <a class="dropdown-item" href="{{ URL::action('HomeController@index') }}">{{ trans('nav.dashboard') }}</a>
                                    @endif
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ trans('nav.logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <br>
        @yield('content')

        <br>
        <footer class="container">
        <div class="row">
            <div class="col-md-4">
            <p>Computerization Proudly Present. - <a href="http://4.wflmssam.sinaapp.com" target="_blank">About Us</a></p>
            </div>

          <div class="col-md-4"></div>

          <div class="col-md-4">
            <p>App Version 20170831 Release Candidate</p>
          </div>
        </div>
        </footer>
        <!-- <p>&nbsp;</p> -->
        <p>&nbsp;</p>

    </div>

    <!-- Scripts -->
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
    <script src="{{ asset('simditor/scripts/module.min.js') }}"></script>
    <script src="{{ asset('simditor/scripts/hotkeys.min.js') }}"></script>
    <script src="{{ asset('simditor/scripts/uploader.min.js') }}"></script>
    <script src="{{ asset('simditor/scripts/simditor.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.bootcss.com/Buttons/2.0.0/js/buttons.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap-daterangepicker/2.1.24/moment.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap-daterangepicker/2.1.25/daterangepicker.min.js"></script>
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
    @yield('scripts')
</body>
</html>
