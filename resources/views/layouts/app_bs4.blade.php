<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <title>@yield('title') - SAM</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>

<body>

    <!-- Image and text -->
    <nav class="navbar navbar-light bg-light mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="https://sam.swfla.org/images/logo.svg" width="30" height="30" class="d-inline-block align-top" alt=""> SAM
            </a>
        </div>
    </nav>

 @yield('content')
    <footer class="text-muted mt-4">
      <div class="container d-flex justify-content-between">
        
        <div>
            <span>关注我们</span>
            <br>
            <small>
            <span>微信公众号：Computerization</span>
            </small>
        </div>
        <div class="invisible">
            <span>开放源代码</span><br>
            <small>
            <span><a href="https://github.com/computerization/sam">Github: Computerization/SAM</a></span>
            </small>
        </div>
        <p>
          <small>
          SAM 3.0 beta<br>
          (C)Computerization 2014-2017
          </small>
        </p>
      </div>
      
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

@yield('script')

</body>

</html>