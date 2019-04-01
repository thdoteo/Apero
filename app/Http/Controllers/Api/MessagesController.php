<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MessageRequest;
use App\Message;
use App\User;
use Illuminate\Http\Request;

class MessagesController extends Controller
{

    public function index(Request $request)
    {
        $query = Message::with('user')->orderBy('created_at','DESC');

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
        $result = Message::create($message->validated() + ['user_id' => $message->user()->id])->load('user');

        return ['message' => $result];
    }

}
