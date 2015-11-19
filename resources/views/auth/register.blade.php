@extends('auth.master')
@section('title', 'Login')

@section('extra_scripts')
<script src="//connect.facebook.net/en_US/sdk.js"></script>
<script>
  /**
   * This can't go in its' own file, unfortunately.
   * Facebook relies on it being here.
   */

  window.fbAsyncInit = function() {
    FB.init({
      appId: '1689534681278082',
      xfbml: true,
      version: 'v2.5'
    });

    FB.getLoginStatus(function (response) {
      if (response.status === 'connected') {
        // The user has logged in through Facebook and authorised
        // our application; Send them to their dashboard
        window.location.href = "https://pictunes.dev/";
      }
    });

    $(document).ready(function () {
      $("button.signUpWithFacebook").click(function () {
        console.log('Connecting to Facebook...');

        FB.login(function (response) {
          if (response.status === 'connected') {
            // The user has signed up through Facebook
            var uid = response.authResponse.userID;
            var accessToken = response.authResponse.accessToken;

            FB.api('/me', function(response) {
              // We have their data! Now we can create a new
              // user with it and send them to their fresh
              // and clean dashboard
              window.location.href = "https://pictunes.dev/";
            });
          }
        }, true);
      });
    });
  };
</script>
@stop

@section('content')
@if ($errors)
  @foreach ($errors->all() as $error)
    <p>{{ $error }}</p>
  @endforeach
@endif
<div class="left">
  <button class="signUpWithFacebook">Sign up with Facebook</button>
  <button class="signUpWithTwitter">Sign up with Twitter</button>
</div> <!-- .left -->
<div class="right">
  <form method="POST" action="/auth/register">
    {!! csrf_field() !!}
    <input type="text" name="username" id="username"  placeholder="Username" value="{{ old('username') }}">

    <input type="email" name="email" id="email_address"  placeholder="Email" value="{{ old('email') }}">

    <input type="password" name="password" id="password" placeholder="Password">

    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm">

    <input class="button" type="submit" value="Register">

    <a href="/auth/login">Login</a>
  </form>
</div> <!-- .right -->
@stop
