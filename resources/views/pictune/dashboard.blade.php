@extends('master')
@section('title', 'Dashboard')
@section('content')
<a href="/auth/logout">Logout</a>
<div class="pictunes">
  @foreach (json_decode($pictunes) as $pictune)
    <div class="pictune">
      <p>Creator: {{ $pictune->post_creator }}</p>
      <img src="/pictune_assets/images/{{ $pictune->image_name }}" alt="{{ $pictune->image_name }}">
      <audio>
        <source src="/pictune_assets/audio/{{ $pictune->audio_name }}" type="audio/ogg">
      </audio>
    </div> <!-- .pictune -->
  @endforeach
</div> <!-- .pictunes -->
@stop
