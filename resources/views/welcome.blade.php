@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col">
    <form action="/messages/create" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <input type="text" name="message" class="form-control @if ($errors->has('message')) is-invalid @endif" id="" placeholder="Que estas pensando?">
        @if ($errors->has('message'))
          @foreach ($errors->get('message') as $error)
            <div class="invalid-feedback">
              {{ $error }}
            </div>
          @endforeach
        @endif
        <br>
        {{-- <input type="file" name="image" id="" class="form-control-file"> --}}
        {{ csrf_field() }}
      </div>
    </form>
  </div>
</div>
<div class="row">
  @forelse ($messages as $message)
  <div class="col-6">
    <img src="{{$message->image}}" alt="" class="img-fluid img-thumbnail">
    <p class="card-text">
      <span class="text-muted">Written by: <a href="/{{ $message->user->username }}">{{ $message->user->username }}</a></span>
      <br>
      {{$message->content}}
      <a href="/messages/{{$message->id}}">Leer mas...</a>
    </p>
  </div>
  @empty
  <div class="col-6">
    <p class="text-card">
      No hay mensajes destacados
    </p>
  </div>
  @endforelse
</div>
@if (count($messages))
<div class="row">
  <div class="col-12">
      <div class="mt-3 mx-auto" style="width: fit-content">
        {{ $messages->links() }}
      </div>
  </div>
</div>
@endif
@endsection