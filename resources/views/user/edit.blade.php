@extends('user.master')
@section('title', 'Edit')
@section('content')
@if ($errors->any())
  <ul>
    @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif
<h4>Edit <i>{{{ $user->username }}}</i>:</h4>
{!! Form::model($user, ['method' => 'PATCH', 'action' => ['UserController@update', $user->id]]) !!}
    @include('user._formFields', ['submitButtonText' => 'Save'])
{!! Form::close() !!}
@stop
