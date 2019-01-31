@extends('layouts.app')

@section('content')
  <h1>Conversacion con {{ $conversation->users->except($user->id)->implode('name', ', ') }}</h1>
    @foreach ($conversation->privateMessages as $message)
      <div class="card">
        <h5 class="card-header">
          {{ $message->user->name }} dijo...
        </h5>
        <div class="card-body">
          <p class="card-text">{{ $message->message }}.</p>
        </div>
        <div class="card-footer text-muted">
          {{ $message->created_at }}
        </div>
      </div>
      <br>
    @endforeach
@endsection