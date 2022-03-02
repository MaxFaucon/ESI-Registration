<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'ESI - inscription') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="te<fxt/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/logo.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script
			  src="https://code.jquery.com/jquery-3.6.0.min.js"
			  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
			  crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @yield('head')
    <title>@yield('title')</title>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <!--@yield('title')--->                    
                    <img id="logo" src = "{{ asset('img/logo.png') }}"/>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @guest
                        @else 
                            <li><a class="nav-link" href="/">Home</a></li>
                            @hasrole('Student')
                                @if (\App\Models\Student::hasPae(Auth::user()->id)[0]->pae === true)
                                    <li><a class="nav-link" href="/monpae">PAE</a></li>
                                @else
                                    <li><a class="nav-link" href="/pae">Création PAE</a></li>
                                @endif

                                @if (\App\Models\Student::hasCavp(Auth::user()->id)[0]->cavp !== true)
                                    <li><a class="nav-link" href="/cavpview/{{Auth::user()->id}}">CAVP </a></li>
                                @endif
                                @if (!empty(\App\Models\Student::selectReponse(Auth::user()->id)) && 
                                \App\Models\Student::selectReponse(Auth::user()->id)[0]->reponse != null)
                                    <li><a class="nav-link" href="/cavpReponse">Reponse CAVP</a></li>
                                @endif
                            @endhasrole
                            @hasrole('Administrative staff|cavp staff')
                                <li><a class="nav-link" href="/dashboard">Dashboard</a></li>
                            @endhasrole
                            @unlessrole('Student|Admin|Administrative staff|cavp staff')
                                @if (@isset($registred) && $registred == false)
                                <li><a class="nav-link" href="/inscription">Inscription à l'ESI</a></li>
                                @endif
                            @endunlessrole
                        @endguest
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            @if( count(Auth::user()->roles) > 0 && Auth::user()->roles->first()->name == 'Admin')
                                <li><a class="nav-link" href="{{ route('users.index') }}">Manage Users</a></li>
                                <li><a class="nav-link" href="{{ route('roles.index') }}">Manage Role</a></li>                        
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @unlessrole('Student|Admin|Administrative staff')
            @if (@isset($registred) && $registred == true)
                @if (@isset($refusal))
                <br>
                <div class="container bg-info d-flex justify-content-center">
                    <p>Inscription refusée : {{ $refusal }}</p>
                </div>
                @else
                <div class="container bg-success d-flex justify-content-center">
                    <p>Votre inscription est en attente</p>
                </div>
                @endif
            @endif
            @endunlessrole

            @unlessrole('Admin|Administrative staff')
            @if (@isset($hascavp) && $hascavp == true)
                @if (\App\Models\Student::selectReponse(Auth::user()->id)[0]->reponse == null)
                    <div class="container bg-success d-flex justify-content-center">
                        <p>Votre demande de cavp est en cours</p>
                    </div>
                @endif
            @endif
            @endunlessrole
            <div class="container">
                @yield('content')
            </div>
        </main>
       

        
    </div>
</body>
</html>
