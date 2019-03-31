@extends('layouts.app')

@section('content')

    <div id="app">
        <Messages :user="{{ Auth::user()->id }}"></Messages>
    </div>

@endsection
