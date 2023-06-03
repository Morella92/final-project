<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Odd School Website</title>
    <link rel="icon" href="/img/varie/logo_small.png" type="image/png">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/113dcf80a9.js" crossorigin="anonymous"></script>

    <!-- Usando Vite -->
    @vite('resources/js/app.js')
    <script src="
                                                                            https://cdn.jsdelivr.net/npm/sweetalert2@11.7.10/dist/sweetalert2.all.min.js
                                                                            "></script>
    <link href="
    https://cdn.jsdelivr.net/npm/sweetalert2@11.7.10/dist/sweetalert2.min.css
    " rel="stylesheet">

</head>

<body>
    <div id="app">


        <nav class="navbar navbar-expand-md navbar-style">
            <div class="container">
                <!-- Brand -->
                @if (Request::url() != route('dashboard'))
                    <a class="navbar-brand d-flex align-items-center" href="{{ url('/dashboard') }}">
                        <div>
                            <img class="logo_navbar_small" src="/img/varie/logo_small.png" alt="">
                            <img class="logo_navbar_text" src="/img/varie/text_logo.png" alt="">
                        </div>
                    </a>
                @else
                    <a class="navbar-brand d-flex align-items-center" href="#">
                        <div>
                            <img class="logo_navbar_small" src="/img/varie/logo_small.png" alt="">
                            <img class="logo_navbar_text" src="/img/varie/text_logo.png" alt="">
                        </div>
                    </a>
                @endif

                <!-- Toggle Button -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar Collapse -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            @if (Request::url() != route('dashboard'))
                                <a href="{{ route('dashboard') }}" class="home-link link-style">Home</a>
                            @endif
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link link-style" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


    </div>
    <main class="">
        @yield('content')
    </main>
</body>

</html>
