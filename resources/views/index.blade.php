<!DOCTYPE html>
<html lang="en" class="h-100">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

        <link href="data:image/x-icon;base64,AAABAAEAEBAQAAAAAAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAA7+/vAP///wBCQv8AtbW1AM7OzgAAAMYA3t7eAOfn5wD39/cAwP/AAAAA/wC9vb0AxsbGANbW1gAAAAAAqqqgAAAKqqqqoA3WbEAKqqoFVVu13ECqoF7nfuZdxAqg53d3e+XcCgd3gRh3bl1AB4cXERh7ZcADsXmREYfrYAOxmZmRh+tgCBOyKZF3ddAIGSspkXd10KAZIrmRd+UKoBGZMRd35QqqAREbuH5QqqqgCIM3cAqqqqqgAAAKqqr4HwAA4AcAAMADAACAAQAAgAEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIABAACAAQAAwAMAAOAHAAD4HwAA" rel="icon" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Cambay|Carrois+Gothic+SC|Roboto" rel="stylesheet">

        <style>

            .grow:hover
            {
            -webkit-transform: scale(1.2);
            -ms-transform: scale(1.2);
            transform: scale(1.2);
            transition-duration: .3s;
            }

            .outerdiv {
                position: relative;
                overflow: hidden;
                min-width: 400px !important;
            }

            #batterBG {
                width: 100%;
                height: 100%;
                background-image: url(https://cdn-images-1.medium.com/max/1280/1*luSmy-qRh-0Ij5XfMhFjsw.jpeg);
                background-size: cover;
                background-position: 25%;
                transition: all 2s ease;
                z-index: 1;
            }

            #pitcherBG {
                width: 100%;
                height: 100%;
                background-image: url(https://cdn-s3.si.com/styles/marquee_large_2x/s3/images/GettyImages-866042018.jpg?itok=yNdOvOWi);
                background-size: cover;
                background-position: center;
                transition: all 2s ease;
                z-index: 1;
            }

            .myButtons {
                position: absolute;
                z-index: 2;
                top: 45%;
                left: 50%;
                font-size: 3em;
                margin-left: -110px;
                opacity: .9;
                letter-spacing: 5px;
                /* background-color: transparent;
                border-width: 10px;
                border-color: black;
                color: black;
                font-family: 'Cambay', sans-serif; */
                box-shadow: 5px 5px 5px #222222;
            }

            /* .myButtons:hover {
                background-color: transparent;
            } */

            #overlayTitle {
                position: absolute;
                z-index: 3;
                background: transparent;
                top: 20%;
                left: 50%;
                margin-left: -45px;
            }

            .navbar {
                position: absolute;
                background-color: transparent;
                z-index: 3;
            }


        </style>

    </head>

    <body class="container-fluid h-100 p-0">


        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- <main class="py-4">
                @yield('content')
            </main> -->
        </div>
        <!-- <div id="overlayTitle">
            Player Ranker
        </div> -->

        <div class="d-flex flex-wrap h-100">

            <div id="batterCol" class="flex-fill outerdiv">
                <a href="{{ url('/batters') }}"><button type="button" class="btn btn-secondary btn-lg rounded-0 boarder boarder-dark myButtons"><strong>Batters</strong></button></a>
                <div id="batterBG" class="grow"></div>

            </div>

            <div id="pitcherCol" class="flex-fill outerdiv">
                <a href="{{ url('/pitchers') }}"><button type="button" class="btn btn-secondary btn-lg rounded-0 boarder boarder-dark myButtons" href="/pitchers"><strong>Pitchers</strong></button></a>
                <div id="pitcherBG" class="grow"></div>
            </div>
        </div>

    </body>

</html>
