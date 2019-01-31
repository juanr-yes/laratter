@extends('layouts.app')

@section('content')
<div class="row">
  @foreach ($messages as $message)
    <div class="col-6">
      <img src="{{$message->image}}" alt="" class="img-fluid img-thumbnail">
      <p class="card-text">
        <span class="text-muted">Written by: <a href="/{{ $message->user->username }}">{{ $message->user->username }}</a></span>
        <br>
        {{$message->content}}
        <a href="/messages/{{$message->id}}">Leer mas...</a>
      </p>
    </div>
  @endforeach
</div>
@endsection