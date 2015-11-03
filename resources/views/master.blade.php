<!DOCTYPE html>
<html>
  <head>
    <title>User » @yield('title')</title>
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ elixir('Assets/Stylesheets/Main.css') }}">
  </head>
  <body>
    <div class="container">
      @yield('content')
    </div> <!-- .container -->
  </body>
</html>
