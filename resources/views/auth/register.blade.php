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
    <div>
        Username
        <input type="text" name="username" value="{{ old('username') }}">
    </div>

    <div>
        Email
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        Password
        <input type="password" name="password">
    </div>

    <div>
        Confirm Password
        <input type="password" name="password_confirmation">
    </div>

    <div>
        <button type="submit">Register</button>
    </div>
</form>
@stop