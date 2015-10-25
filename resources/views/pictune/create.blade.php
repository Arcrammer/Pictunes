<!DOCTYPE html>
<html>
  <head>
    <title>Pictune » Create</title>
  </head>
  <body>
    {!! Form::open(['action' => 'DashboardController@store']) !!}
      {!! Form::hidden('post_creator', 1) !!}
      {!! Form::file('image_name', ['accept' => 'image/*']) !!}
      <br />
      {!! Form::file('audio_name', ['accept' => 'audio/*']) !!}
      <br />
      {!! Form::text('tags') !!}
      <br />
      {!! Form::submit('Create') !!}
    {!! Form::close() !!}
  </body>
</html>
