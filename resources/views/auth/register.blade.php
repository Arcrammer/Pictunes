@extends('auth.master')
@section('title', 'Register')

@section('extra_scripts')
<script src="//connect.facebook.net/en_US/sdk.js"></script>
<script>
  /**
   * This can't go in its' own file, unfortunately.
   * Facebook relies on it being here.
   */

  // function preventSignUp() {
  //   // The user has logged in through Facebook and authorised
  //   // our application; Send them to their dashboard
  //   // TODO: Uncomment this
  //   //  window.location.href = "https://pictunes.dev/";
  //
  //   $("#problem-message").show();
  //
  //   // Discourage the user from clicking the buttons
  //   $("button, input").addClass("disabled");
  //
  //   // Prevent the click event listener from contacting Facebook
  //   $("button").off("click");
  //
  //   // Prevent the form form being submittable
  //   $("input[type='submit']").attr('disabled', 'disabled');
  //
  //   // Just in case their browser doesn't
  //   // support the 'disabled' attribute
  //   $("form").attr('method', 'GET');
  //   $("form").attr('action', '#');
  // }
  //
  // window.fbAsyncInit = function() {
  //   FB.init({
  //     appId: '1689534681278082',
  //     xfbml: true,
  //     version: 'v2.5'
  //   });
  //
  //   FB.getLoginStatus(function (response) {
  //     if (response.status === 'connected') {
  //       preventSignUp();
  //     }
  //   });
  //
  //   $(document).ready(function () {
  //     $("button.signUpWithFacebook").click(function () {
  //       FB.login(function (response) {
  //         if (!response.error) {
  //           // The user has signed up through Facebook; Attempt
  //           // to create a record for them in the database
  //           var uid = response.authResponse.userID;
  //           var accessToken = response.authResponse.accessToken;
  //
  //           FB.api('/' + uid + '?fields=id,name,email', function(response) {
  //             // Now that we have data for the database
  //             // we should save it and create the user
  //             //
  //             // TODO: Uncomment this
  //             // window.location.href = "https://pictunes.dev/";
  //             //
  //             // Change all of the form values then
  //             // submit it, that way the user should
  //             // see the standard validation messages.
  //             //
  //             $("input[name='username']").val(response.name);
  //             $("input[name='username']").val(
  //               $("input[name='username']").val().replace(' ', '')
  //             );
  //             $("input[name='email']").val(response.email);
  //           });
  //         }
  //       }, {scope: 'public_profile,email'});
  //     });
  //   });
  // };
</script>
@stop

@section('content')
@if ($errors)
  @foreach ($errors->all() as $error)
    <p>{{ $error }}</p>
  @endforeach
@endif
<p id="problem-message">
  You've already registered.
  <a href="https://pictunes.dev/">Go to your dashboard!</a>
</p>
<div class="left">
  <!-- <button class="signUpWithFacebook">Sign up with Facebook</button> -->
  <!-- <button class="signUpWithTwitter">Sign up with Twitter</button> -->
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
