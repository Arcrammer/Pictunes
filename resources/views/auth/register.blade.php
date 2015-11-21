@extends('auth.master')
@section('title', 'Register')

@section('extra_scripts')
<!-- <script src="//connect.facebook.net/en_US/sdk.js"></script> -->
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
<div class="login-probs">
  @foreach ($errors->all() as $error)
    <p class="login-prob">{{ $error }}</p>
  @endforeach
</div> <!-- .login-probs -->
@endif
<p id="problem-message">
  You've already registered.
  <a href="https://pictunes.dev/">Go to your dashboard!</a>
</p>
<div class="left">
  <!-- <button class="signUpWithFacebook">Sign up with Facebook</button> -->
  <!-- <button class="signUpWithTwitter">Sign up with Twitter</button> -->
  <div class="terms">
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean pellentesque purus eu justo lobortis, vel laoreet elit placerat. Maecenas luctus leo lectus, et ornare quam efficitur sit amet. Nulla rutrum diam at diam vulputate, ac sollicitudin arcu mollis. Fusce in quam at dui congue tempor.</p>
    <p>Vivamus suscipit, urna non bibendu condimentum, lorem nulla tristique neque et vestibulum dolor ante vel lorem. Curabitu velit enim, consectetur eget dapibus ut fermentum quis velit. Integer non felis ve magna egestas dictum quis at ligula Vestibulum vitae lorem nunc. Aenean non...</p>
    <p>Proin et eleifend magna. Curabitur luctus est quam, sit amet pharetra magna consequat posuere. Proin eget ligula urna. In tempor ac arcu non finibus. Phasellus sed convallis metus, non aliquam dolor. Quisque at euismod arcu. Vivamus elementum velit ac vehicula finibus....</p>
    <p>Suspendisse metus sem, ullamcorper ac sagittis porta, feugiat dignissim mi. Maecenas ac mollis tellus. Sed pretium imperdiet turpis ac egestas. In a urna consequat, dapibus purus sed, interdum lorem. Nam feugiat, massa cursus aliquam semper, magna mi rutrum neque, sed euismod dui nibh nec purus. Maecenas vestibulum ligula at consectetur dignissim. Pellentesque ultricies lorem ut mi scelerisque fringilla. Cras quis diam vel mi hendrerit vehicula vel ac quam.</p>
    <p>Duis ut rhoncus ipsum. Vestibulum in enim egestas, pulvinar dolor sed, mollis lorem. Fusce porta tortor ultricies tellus fringilla venenatis. Donec ut volutpat ipsum, gravida imperdiet elit. Integer interdum elementum enim, ac malesuada orci accumsan eget. Etiam ultrices urna tortor. Donec facilisis orci sed tortor commodo laoreet. Nunc quam lectus, pharetra a purus eget, sollicitudin molestie quam. Vestibulum sodales eu quam nec bibendum. Ut mollis nulla non eros semper, a ultrices ipsum aliquet.</p>
  </div> <!-- .terms -->
  <input form="registration-form" type="checkbox" name="agreement" id="agreement" class="agreement-box" value="yes">
  <label for="agreement" class="agreement-label">I agree to the terms and conditions of Pictunes</label>
</div> <!-- .left -->
<div class="right">
  <form id="registration-form" method="POST" action="/auth/register">
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
