<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    private $numberOfMessagesPerPage = 2;

    public function __construct()
    {
        $this->authorizeResource(Message::class, 'message');
        $this->middleware('auth');
    }

    public function index()
    {
        $messages = Message::orderBy('created_at','DESC')->simplePaginate($this->numberOfMessagesPerPage);

        return view('messages.index', compact('messages'));
    }

    public function store(MessageRequest $message)
    {
        Message::create($message->validated() + ['user_id' => Auth::user()->id]);

        return redirect()
            ->route('messages.index')
            ->with('success', 'Message created successfully.');
    }

    public function update(MessageRequest $message, int $id)
    {
        Message::findOrFail($id)->update($message->validated());

        return redirect()
            ->route('messages.index')
            ->with('success', 'Message updated successfully.');
    }

    public function destroy(int $id)
    {
        Message::findOrFail($id)->delete();

        return redirect()
            ->route('messages.index')
            ->with('success', 'Message deleted successfully.');
    }
}
