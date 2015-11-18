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
        Username
        <!-- <input type="text" name="username" value="{{ old('username') }}"> -->
        <input type="text" name="username" value="iAlexander">
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

    <div>
        <a href="/auth/register">I need an account.</a>
    </div>

</form>
@stop
