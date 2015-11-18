@extends('user.master')
@section('title', 'Create')
@section('content')
@foreach ($errors->all() as $error)
{{{ $error }}}
@endforeach
<h4>Create User:</h4>
{!! Form::open(['action' => 'UserController@store']) !!}
    @include('user._formFields', ['submitButtonText' => 'Create'])
{!! Form::close() !!}
@stop
