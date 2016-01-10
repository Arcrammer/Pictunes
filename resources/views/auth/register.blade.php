@extends('auth.master')
@section('title', 'Register')

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
  <div class="terms-container">
    <div class="terms">
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean pellentesque purus eu justo lobortis, vel laoreet elit placerat. Maecenas luctus leo lectus, et ornare quam efficitur sit amet. Nulla rutrum diam at diam vulputate, ac sollicitudin arcu mollis. Fusce in quam at dui congue tempor.</p>
      <p>Vivamus suscipit, urna non bibendu condimentum, lorem nulla tristique neque et vestibulum dolor ante vel lorem. Curabitu velit enim, consectetur eget dapibus ut fermentum quis velit. Integer non felis ve magna egestas dictum quis at ligula Vestibulum vitae lorem nunc. Aenean non...</p>
      <p>Proin et eleifend magna. Curabitur luctus est quam, sit amet pharetra magna consequat posuere. Proin eget ligula urna. In tempor ac arcu non finibus. Phasellus sed convallis metus, non aliquam dolor. Quisque at euismod arcu. Vivamus elementum velit ac vehicula finibus....</p>
      <p>Suspendisse metus sem, ullamcorper ac sagittis porta, feugiat dignissim mi. Maecenas ac mollis tellus. Sed pretium imperdiet turpis ac egestas. In a urna consequat, dapibus purus sed, interdum lorem. Nam feugiat, massa cursus aliquam semper, magna mi rutrum neque, sed euismod dui nibh nec purus. Maecenas vestibulum ligula at consectetur dignissim. Pellentesque ultricies lorem ut mi scelerisque fringilla. Cras quis diam vel mi hendrerit vehicula vel ac quam.</p>
      <p>Duis ut rhoncus ipsum. Vestibulum in enim egestas, pulvinar dolor sed, mollis lorem. Fusce porta tortor ultricies tellus fringilla venenatis. Donec ut volutpat ipsum, gravida imperdiet elit. Integer interdum elementum enim, ac malesuada orci accumsan eget. Etiam ultrices urna tortor. Donec facilisis orci sed tortor commodo laoreet. Nunc quam lectus, pharetra a purus eget, sollicitudin molestie quam. Vestibulum sodales eu quam nec bibendum. Ut mollis nulla non eros semper, a ultrices ipsum aliquet.</p>
    </div> <!-- .terms -->
  </div> <!-- .terms-container -->
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
