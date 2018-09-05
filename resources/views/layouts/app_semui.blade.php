<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>@yield('title')- SAM</title>

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
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="{{ asset('semantic/semantic.min.js') }}"></script>
    {{-- Semantic-UI ends --}}

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
    </style>

</head>
<body>
    <div class="pusher">


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

    {{-- simditor Scripts Here --}}
    <script src="{{ asset('simditor/scripts/module.min.js') }}"></script>
    <script src="{{ asset('simditor/scripts/hotkeys.min.js') }}"></script>
    <script src="{{ asset('simditor/scripts/uploader.min.js') }}"></script>
    <script src="{{ asset('simditor/scripts/simditor.min.js') }}"></script>
    {{-- simditor Scripts Here --}}

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
