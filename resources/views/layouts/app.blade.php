<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" sizes="256x256" href="/img/logo/icon.png">
    <link rel="apple-touch-icon" href="/img/logo/icon.png">
    <link rel="apple-touch-icon-precomposed" sizes="128x128" href="/img/logo/icon.png">
    <title>@yield('title', 'Cubing-JXNU')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     @yield('links')
    
    <style>
        .navbar-brand {
            padding: 5px 15px;
        }
        .navbar-static-top {
    border-color: #e7e7e7;
    background-color: #fff;
    box-shadow: 0px 1px 11px 2px rgba(42, 42, 42, 0.1);
    border-top: 4px solid #a5d6fb;
    margin-top: 0px;
}
        @yield('style')
    </style>
</head>
<body>
    

    <div id="app">
        <nav class="navbar navbar-default sticky-top navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
<!--                         <img src="/img/logo/icon.png" alt="Logo" height="22" width="22" style="
    float: left;
    height: 40px;
    width: 40px;
    margin: 5px;
"> -->
                    <a class="navbar-brand" href="{{ url('/') }}" title="江西师范大学 Cubing 魔方协会">
                        <img src="/img/logo/icon.png" height="40" style="display: inline-block;">
                        Cubing 师大
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('home') }}">首页</a></li>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">登录</a></li>
                            <li><a href="{{ route('register') }}">注册</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            退出登录
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
