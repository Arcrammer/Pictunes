@extends('master')
@section('title', 'Dashboard')
@section('content')
<div class="pictunes">
  @foreach (json_decode($pictunes) as $pictune)
    <div class="pictune">
      <p>Creator: {{ $pictune->poster_username }}</p>
      <img src="pictune_assets/images/{{ $pictune->image_name }}" alt="{{ $pictune->image_name }}">
      <p>Audio: {{ $pictune->audio_name }}</p>
    </div> <!-- .pictune -->
  @endforeach
</div> <!-- .pictunes -->
@stop
