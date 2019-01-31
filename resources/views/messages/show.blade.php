@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col text-center">
    <h1 class="h3">Message ID: {{ $message->id }}</h1>
    <p class="card-text">
      {{ $message->content }}
    </p>
    <img src="{{ $message->image }}" alt="" class="img-fluid img-thumbnail">
    <small class="text-muted d-block mt-3"><strong>Written by:</strong> <a href="/{{ $message->user->username }}">{{ $message->user->username }}</a><br>{{ $message->created_at }}</small>
    <br>
  </div>
</div>
<responses :message="{{ $message->id }}"></responses>
@endsection