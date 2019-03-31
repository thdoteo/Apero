<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    private $numberOfMessagesPerPage = 10;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        $messages = Message::latest()->paginate($this->numberOfMessagesPerPage);

        return view('messages.index', compact('messages', 'users'));
    }

    public function store(MessageRequest $message)
    {
        Message::create($message->validated() + ['user_id' => Auth::user()->id]);

        return redirect()
            ->route('messages.index')
            ->with('success', 'Message created successfully.');
    }
}
