@extends('auth.master')
@section('title', 'Login')
@section('content')
@if ($errors)
  @foreach ($errors->all() as $error)
    <p>{{ $error }}</p>
  @endforeach
@endif
<form method="POST" action="/auth/register">
  {!! csrf_field() !!}
  <input type="text" name="username" id="username"  placeholder="Username" value="{{ old('username') }}">

  <input type="email" name="email" id="email_address"  placeholder="Email" value="{{ old('email') }}">

  <input type="password" name="password" id="password" placeholder="Password">

  <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm">

  <input class="button" type="submit" value="Register">

  <a href="/auth/login">Login</a>
</form>
@stop
