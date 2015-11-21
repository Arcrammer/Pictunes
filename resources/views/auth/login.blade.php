@extends('auth.master')
@section('title', 'Login')
@section('content')
@if ($errors)
<div class="login-probs">
  @foreach ($errors->all() as $error)
    <p class="login-prob">{{ $error }}</p>
  @endforeach
</div> <!-- .login-probs -->
@endif
<div class="left login-left">
  <form method="POST" action="/auth/login">
    {!! csrf_field() !!}
    <!-- <input type="text" name="username" value="{{ old('username') }}"> -->
    <input type="text" name="username" placeholder="Username" value="iAlexander">

    <input type="password" name="password" placeholder="Password" id="password" value="secret">

    <div class="remember-box">
      <input type="checkbox" name="remember" id="remember" checked>
      <label for="remember">Remember Me</label>
    </div>

    <input type="submit" class="button" value="Login">

    <a href="/auth/register">I need an account.</a>
  </form>
</div> <!-- .left .login-left -->
@stop
