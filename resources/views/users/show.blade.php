@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col text-center">
    <img src="{{ $user->avatar }}" alt="" class="img-fluid rounded mb-2">
    <h1>User: <strong>{{ $user->username }}</strong></h1>
    <a href="{{ $user->username }}/follows" class="btn btn-link"><strong>{{ $user->follows->count() }}</strong> Seguidos</a>
    <a href="{{ $user->username }}/followers" class="btn btn-link"><strong>{{ $user->followers->count() }}</strong> Seguidores</a>
    <br><br>
    @if (session('success'))
      <span class="text-success d-block">{{ session('success') }}</span>
      <br>
    @endif
    @if (Auth::check())
      @if (Gate::allows('dms', $user))
        <form action="/{{ $user->username }}/dms" method="post">
          <input type="text" name="message" id="" class="form-control">
          <br>
          <button type="submit" class="btn btn-success">Enviar DM</button>
          @csrf
        </form>
        <br>
      @endif
      @if (Auth::user()->isFollowing($user))
        <form action="/{{ $user->username }}/unfollow" method="post">
          <button class="btn btn-danger">Unfollow</button>
          @csrf
        </form>
      @else
        <form action="/{{ $user->username }}/follow" method="post">
          <button class="btn btn-primary">Follow</button>
          @csrf
        </form>
      @endif
    @endif
    <br>
  </div>
</div>
<div class="row">
  @forelse ($user->messages as $message)
  <div class="col-6 text-center">
    <h1 class="h3">Message ID: {{ $message->id }}</h1>
    <p class="card-text">
      {{ $message->content }}
      <a href="/messages/{{$message->id}}">Leer mas...</a>
    </p>
    <img src="{{ $message->image }}" alt="" class="img-fluid img-thumbnail">
    <small class="text-muted d-block mt-3"><strong>Written by:</strong> {{ $user->username }}<br>{{ $message->created_at }}</small>
    <br>
  </div>
  @empty
  <div class="col-12">
    <p>Este usuario no tiene mensajes asociados</p>
  </div>
  @endforelse
</div>
@endsection