@extends('auth.master')
@section('title', 'Login')
@section('content')
@if ($errors)
  @foreach ($errors->all() as $error)
    <p>{{ $error }}</p>
  @endforeach
@endif
<form method="POST" action="/auth/login">
    {!! csrf_field() !!}

    <div>
        Email
        <!-- <input type="email" name="email_address" value="{{ old('email_address') }}"> -->
        <input type="email" name="email" value="iAlexander@pictunes.dev">
    </div>

    <div>
        Password
        <input type="password" name="password" id="password" value="secret">
    </div>

    <div>
        <input type="checkbox" name="remember" id="remember" checked>
        <label for="remember">Remember Me</label>
    </div>

    <div>
        <button type="submit">Login</button>
    </div>
</form>
@stop
