@extends('pictune.master')
@section('title', 'Dashboard')
@section('content')

<!-- Links at the top -->
<nav>
  <a href="/">Dashboard</a>
  <a href="/auth/logout">Logout</a>
</nav>

<!-- Feed -->
<div class="pictunes">
  @foreach (json_decode($pictunes) as $pictune)
    <div class="pictune">
      <p>Creator: {{ $pictune->poster_username }}</p>
      <img src="/pictune_assets/images/{{ $pictune->image_name }}" alt="{{ $pictune->image_name }}">
      <audio>
        <source src="/pictune_assets/audio/{{ $pictune->audio_name }}" type="audio/ogg">
      </audio>
      <p><a href="pictuner/{{ $pictune->poster_username }}">More posts by {{ $pictune->poster_username }}.</a></p>
    </div> <!-- .pictune -->
  @endforeach
</div> <!-- .pictunes -->
@stop
