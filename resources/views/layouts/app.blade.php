<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Pizza') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/products.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" media="screen" type="text/css">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style-portfolio.css') }}">
    <link rel="stylesheet" href="{{ asset('css/picto-foundry-food.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">

    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">


    <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
            <div class="row">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Restourant') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav main-nav clear ">
                        <li><a class="color_animation" href="/about">ABOUT</a></li>
                        <li><a class="color_animation" href="/products">Meniu</a></li>
                        <li><a class="color_animation" href="/reservations">Rezervuoti staliuka</a></li>
                        <li><a class="color_animation" href="/contacts">Kontaktai</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav  main-nav navbar-right">

                            <li><a  class="color_animation" href="/shopingCart"><i class="fa fa-shoping-cart" aria-hidden="true" en></i>Cart
                                <span class="badge">{{Session::has('cart') ? Session::get('cart')->totalQty : ' '}}</span>
                                </a></li>
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a class="color_animation" href="{{ route('login') }}">Login</a></li>
                            <li><a class="color_animation" href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a class="color_animation" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a class="color_animation" href="/user/{{Auth::user()->id}}">User Profile</a>
                                    </li>
                                    <li>
                                        <a class="color_animation" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
                </div>
            </div>
        </nav>

        @yield('content')

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>



@yield('script')
    <footer class="sub_footer">
        <div class="container">
            <div class="col-md-4"><p class="sub-footer-text text-center">&copy; Restaurant 2017, Create by <a href="#">Egiska</a></p></div>
            <div class="col-md-4"><p class="sub-footer-text text-center">Back to <a href="#top">TOP</a></p>
            </div>
            <div class="col-md-4"><p class="sub-footer-text text-center">Built With Laravel </p></div>
        </div>
    </footer>
    </body>
</html>
