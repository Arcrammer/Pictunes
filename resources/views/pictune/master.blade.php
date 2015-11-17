<!DOCTYPE html>
<html>
  <head>
    <title>Dashboard » @yield('title')</title>
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ elixir('Assets/Stylesheets/Dashboard.css') }}">
  </head>
  <body>
    <div class="container">
      @yield('content')
    </div> <!-- .container -->
  </body>
</html>
