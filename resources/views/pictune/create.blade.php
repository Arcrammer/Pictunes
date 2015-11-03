@extends('master')
@section('title', 'Create')
@section('content')
{!! Form::open([
    'action' => 'DashboardController@store',
    'enctype' => 'multipart/form-data'
  ]) !!}
  {!! Form::hidden('post_creator', 1) !!}
  {!! Form::file('image_name', ['accept' => 'image/*']) !!}
  <br />
  {!! Form::file('audio_name', ['accept' => 'audio/*']) !!}
  <br />
  {!! Form::text('tags') !!}
  <br />
  {!! Form::submit('Create') !!}
{!! Form::close() !!}
@stop
