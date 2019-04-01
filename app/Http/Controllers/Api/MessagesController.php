<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Message;
use App\User;
use Illuminate\Http\Request;

class MessagesController extends Controller
{

    public function index()
    {
        $messages = Message::with('user')->orderBy('created_at','DESC')->get();

        return response()->json([
            'messages' => $messages
        ]);
    }

}
