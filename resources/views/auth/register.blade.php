@extends('layouts.app')

@section('content')

    <div class="auth">

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input id="name" type="text" class="form-input {{ $errors->has('name') ? ' form-input_invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                @if ($errors->has('name'))
                    <span class="form-feedback" role="alert">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email address</label>
                <input id="email" type="email" class="form-input {{ $errors->has('email') ? ' form-input_invalid' : '' }}" name="email" value="{{ old('email') }}" required>
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
                <label for="password-confirm" class="form-label">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-input" name="password_confirmation" required>
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Color</label>
                <input id="email" type="email" class="form-input {{ $errors->has('color') ? ' form-input_invalid' : '' }}" name="color" value="{{ old('color') }}" required>
                @if ($errors->has('color'))
                    <span class="form-feedback" role="alert">{{ $errors->first('color') }}</span>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="form-button">Register</button>
            </div>
        </form>

    </div>

@endsection
