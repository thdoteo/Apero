@extends('layouts.app')

@section('content')

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label for="email" class="form-label">Email address</label>
            <input id="email" type="email" class="form-input {{ $errors->has('email') ? ' form-input_invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <span class="form-feedback" role="alert">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input id="password" type="password" class="form-input {{ $errors->has('password') ? ' form-input_invalid' : '' }}" name="password" required>
            @if ($errors->has('password'))
                <span class="form-feedback" role="alert">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="form-button">Login</button>

            <a class="link" href="{{ route('password.request') }}">Forgot your password?</a>
        </div>
    </form>

@endsection
