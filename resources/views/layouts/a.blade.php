<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        .button2 {
            display: inline-block;
            transition: all .3s ease-in;
            position: relative;
            overflow: hidden;
            z-index: 1;
            color: #2a2929;
            padding: 0.5em 1.5em;
            font-size: 18px;
            border-radius: 0.5em;
            background: #d1cece;
            border: 1px solid #e8e8e8;
            box-shadow: 6px 6px 12px #e0dede;
        }

        .button2:active {
            color: #666;
            box-shadow: inset 4px 4px 12px #c5c5c5,
                        inset -4px -4px 12px #ffffff;
        }

        .button2:before {
            content: "";
            position: absolute;
            left: 50%;
            transform: translateX(-50%) scaleY(1) scaleX(1.25);
            top: 100%;
            width: 140%;
            height: 180%;
            background-color: rgba(0, 0, 0, 0.05);
            border-radius: 50%;
            display: block;
            transition: all 0.5s 0.1s cubic-bezier(0.55, 0, 0.1, 1);
            z-index: -1;
        }

        .button2:after {
            content: "";
            position: absolute;
            left: 55%;
            transform: translateX(-50%) scaleY(1) scaleX(1.45);
            top: 180%;
            width: 160%;
            height: 190%;
            background-color: #009087;
            border-radius: 50%;
            display: block;
            transition: all 0.5s 0.1s cubic-bezier(0.55, 0, 0.1, 1);
            z-index: -1;
        }

        .button2:hover {
        color: #ffffff;
        border: 1px solid #009087;
        }

        .button2:hover:before {
        top: -35%;
        background-color: #009087;
        transform: translateX(-50%) scaleY(1.3) scaleX(0.8);
        }

        .button2:hover:after {
        top: -45%;
        background-color: #009087;
        transform: translateX(-50%) scaleY(1.3) scaleX(0.8);
        }


    </style>


</head>
<body>
    <div id="app" >
        <nav class="navbar navbar-expand-md  bg-white shadow-sm">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto"  >
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item" >
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" style="margin-right:40px;color:#40beae" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest


            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <div class="back_1">





        <div class="container-fluid">
            <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-6">


        </div>
        <div class="col-md-4 " style="padding-top: 60vh">
            @if (Auth::user())
                @if (Auth::user()->Admin == true)
                    <a href="/questions"><button style="width:130px;" class="button2">Questions </button></a>
                    <a href="/dashboard/users"><button style="width:130px;" class="button2">Dashboard </button></a>
                @endif
            @endif

        <a href="/start"><button  style="width:130px;" class="button2">Start</button></a>

        </div>
        <div class="col-md-5"></div>

            </div>
        </div>


        </div>
</body>
</html>
