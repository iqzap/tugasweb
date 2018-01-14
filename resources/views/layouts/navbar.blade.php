<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <!--Import Google Icon Font-->
    <link href="{{ asset('css/material-icon.css') }}" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.min.css') }}" media="screen,projection" />
    <!--Let browser know website is optimized for mobile-->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

    </style>
    <script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
</head>

<body>

    <!--Import jQuery before materialize.js-->
    <div id="app">
        <div class="col s12">
            <script type="text/javascript">
                $(document).ready(
                    function() {
                        //  $(".button-collapse").sideNav();
                        $(".dropdown-button").dropdown();

                    }
                );

            </script>

            <!--navbar-->
            <nav>
                <div class="nav-wrapper">
                    <a href="#!" style="padding-left: 20px;" class="brand-logo"><i><img src="{{ asset('desain/logo.png') }}" alt="logo">  Datib Store</i></a>
                    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>

                    <!--navbar web-size-->

                    <!--Dropdown-->
                    @guest
                    <ul class="right hide-on-med-and-down">
                        <li><a href="{{ route('login') }}"><i class="material-icons left">person</i>Login</a></li>
                        <li><a href="{{ route('register') }}"><i class="material-icons left">fingerprint</i>Register</a></li>
                    </ul>
                    @else
                    <ul id="dropdown1" class="dropdown-content">
                        <li><a href="#!">{{Auth::user()->nrp}}</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="material-icons">exit_to_app</i>Logout
                                        </a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </ul>
                    <!--Dropdown-->

                    <ul class="right hide-on-med-and-down">
                        <li>{{Auth::user()->name}}</li>
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="material-icons">exit_to_app</i>
                                        </a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </ul>
                    @endguest
                    <!--navbar web-size-->

                    <!--navbar mobile-size-->

                    <!--navbar mobile-size-->
                </div>
            </nav>
            <!--navbar-->
        </div>
        @yield('content')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
