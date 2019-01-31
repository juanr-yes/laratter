<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Http\Requests\CreateMessageRequest;

class MessagesController extends Controller {
  public function show (Message $message) {
    return view('messages.show', [
      'message' => $message
    ]);
  }

  public function create (CreateMessageRequest $request) {
    $user = $request->user();
    $message = Message::create([
      'content' => $request->input('message'),
      // 'image' => $request->file('image')->store('messages', 'public'),
      'user_id' => $user->id
    ]);
    return redirect('/messages/'.$message->id);
  }

  public function search (Request $request) {
    $query = $request->input('query');
    $messages = Message::search($query)->get();
    $messages->load('user');

    return view('messages.index', [
      'messages' => $messages
    ]);
  }

  public function responses (Message $message) {
    return $message->responses;
  }
}