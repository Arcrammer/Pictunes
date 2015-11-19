<!DOCTYPE html>
<html>
  <head>
    <title>Pictunes » @yield('title')</title>
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ elixir('css/Authentication.css') }}">
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    @yield('extra_scripts')
  </head>
  <body>
    <div class="container">
      @yield('content')
    </div> <!-- .container -->
  </body>
</html>
