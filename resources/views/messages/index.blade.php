@extends('layouts.app')

@section('content')

    <div class="content">

        <div class="messages">

            @foreach  ($messages as $message)
                <div class="message @if ($message->user->id === Auth::user()->id) message_own @endif">
                    <div class="message-avatar" style="color: {{ $message->user->color }}; background: {{ $message->user->colorLight }}">
                        {{ $message->user->letter }}
                    </div>
                    <div class="message-content" style="color: {{ $message->user->color }}; background: {{ $message->user->colorLight }}">
                        {{ $message->content }}
                    </div>
                    <div class="message-date">{{ $message->created_at }}</div>
                </div>
            @endforeach

        </div>

    </div>

    <div class="newmessage">
        <form action="/messages" method="post">
            @csrf
            <input class="newmessage-message" name="content" id="message" autocomplete="off" placeholder="Say hello...">
        </form>
    </div>

@endsection
