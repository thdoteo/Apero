<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

    <div class="container">

        <div class="header">
            <div class="header-icon">A</div>

            @auth
            <div class="header-auth">
                <a class="dropdown-item" style="display: none;" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

                <img src="{{ Auth::user()->avatar_url }}" alt="header-auth-avatar" class="header-auth-avatar">
            </div>
            @endauth
        </div>

        <div class="content">
            @yield('content')
        </div>

    </div>

</body>
</html>
