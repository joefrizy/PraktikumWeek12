    <!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Home') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>

    <body>
        @Auth
            <div id="app">
                <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
                    <div class="container">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav me-auto">
                                @php
                                    $currentRouteName = Route::currentRouteName();
                                @endphp
                                <a href="{{ route('home') }}" class="navbar-brand mb-0 h1">
                                    <i class="bi-hexagon-fill me-2 text-primary"></i> Data Master</a>
                                <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                                    data-bs-target="#navbarSupportedContent">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <hr class="d-md-none text-white-50">
                                    <ul class="navbar-nav flex-row flex-wrap">
                                        <li class="nav-item col-2 col-md-auto"><a href="{{ route('home') }}"
                                                class="nav-link @if ($currentRouteName == 'home') active @endif">Home</a>
                                        </li>
                                        <li class="nav-item col-2 col-md-auto"><a href="{{ route('employees.index') }}"
                                                class="nav-link @if ($currentRouteName == 'employees.index') active @endif">Employee</a>
                                        </li>
                                    </ul>
                            </ul>
                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ms-auto">
                                <!-- Authentication Links -->
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="dropdown-toggle btn btn-outline-light my-2 ms-md-auto"
                                        href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" v-pre><i class="bi-person-circle"></i>
                                        {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('profile') }}"><i
                                                class="bi-person-fill"></i>
                                            {{ __('My profile') }}</a>
                                        <hr>
                                        <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();"><i
                                                class="bi bi-lock"></i>
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </nav>
            @endauth
            <main class="py-4">
                @yield('content')
                @include('sweetalert::alert')
                @stack('scripts')
            </main>
        </div>

    </body>

    </html>
