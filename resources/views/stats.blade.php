<!DOCTYPE html>
<html lang="en">
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

        <style>

            * {
                padding: 0;
                margin: 0;
            }
            html, body {
                height: 100%;
            }

            #statspage {
                background-image: url(https://images.unsplash.com/photo-1496283391099-4bda095db381?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=8794ebd95c8b75f60953619f92e71ba2&auto=format&fit=crop&w=829&q=80);
                height: 100%;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }

            #auth {
                position: absolute;
                background-color: transparent;
                z-index: 3;
            }

            #navbarNavAltMarkup {
                height: 95%;
                margin-top: 50px;
                margin-bottom: 20px;
            }

            #display {
                background-color: white;
                margin: 50px 20px 20px 20px;
            }

            /* #categorySelector {
                position: absolute;
                z-index: 3;
                background-color: white;
                margin-right: 8%;
                margin-left: 8%;
                margin-top: 60px;
                height: 35%;
                width: 84%;
            }

            #display {
                position: absolute;
                z-index: 3;
                background-color: white;
                margin-right: 4%;
                margin-left: 4%;
                margin-top: 375px;
                height: 45%;
                width: 92%;
            } */



        </style>

    </head>

    <body>

        <div id="app">
            <nav id="auth" class="navbar navbar-expand navbar-dark navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>


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
        </div>

        <div id="statspage" class="container-fluid">
            <div class="row h-100">
                <nav id="sidebar" class="navbar navbar-expand-sm navbar-dark col-md-2">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-dark" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <ul>
                                <li class="nav-item nav-link" href="#">Home</li>
                                <li class="nav-item nav-link" href="#">Features</li>
                                <li class="nav-item nav-link" href="#">Pricing</li>
                                <li class="nav-item nav-link" href="#">Disabled</li>
                                <li class="nav-item nav-link" href="#">Home</li>
                                <li class="nav-item nav-link" href="#">Features</li>
                                <li class="nav-item nav-link" href="#">Pricing</li>
                                <li class="nav-item nav-link" href="#">Disableddddddddddddd</li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <div id="display" class="col">
                </div>
            </div>
        </div>


            <!-- <div id="categorySelector">

                <div class="btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-secondary active">
                        <input type="checkbox" checked autocomplete="off">Runs
                    </label>
                </div>

            </div>

            <div id="display" class="d-flex">



            </div> -->





        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    </body>
