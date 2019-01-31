@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col text-center">
    <img src="{{ $user->avatar }}" alt="" class="img-fluid rounded mb-2">
    <h1>User: <strong>{{ $user->username }}</strong></h1>
  </div>
</div>
<div class="row">
  @forelse ($user->follows as $follow)
  <div class="col-6 text-center">
    <small class="card-text">Username:</small>
    <h1 class="h3"><a href="/{{ $follow->username }}">{{ $follow->username }}</a></h1>
    <img src="{{ $follow->avatar }}" alt="" class="img-fluid rounded mb-2">
  </div>
  @empty
  <div class="col-12">
    <p class="text-center">Este usuario no sigue a otros usuarios</p>
  </div>
  @endforelse
</div>
@endsection