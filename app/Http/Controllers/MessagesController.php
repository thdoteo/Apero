<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\Http\Requests\MessageRequest;
use App\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Message::class, 'message');
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = Message::with('user')->orderBy('created_at','DESC');

        // Handle requests for previous messages
        if ($request->get('before'))
        {
            $query->where('created_at', '<', $request->get('before'));
        }

        $messages = array_reverse($query->limit(10)->get()->toArray());
        $count = $query->count();

        return compact('messages', 'count');
    }

    public function store(MessageRequest $message)
    {
        $message = Message::create($message->validated() + ['user_id' => $message->user()->id])->load('user');

        // Send a NewMessage event to inform clients through web sockets
        broadcast(new NewMessage($message));

        return compact('message');
    }

}
