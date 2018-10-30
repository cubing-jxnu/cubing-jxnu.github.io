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
    <script src="https://use.fontawesome.com/4d11ec76b3.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css"
          integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
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
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}" title="江西师范大学 Cubing 魔方协会">
                    <img src="/img/logo/icon.png" height="40" style="display: inline-block;">
                    Cubing 师大
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ route('home') }}">
                            <i class="fa fa-home"></i>
                            首页
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fas fa-toolbox"></i>
                            工具箱
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('tool.lottery') }}">
                                    <i class="fas fa-dice-two"></i>
                                    抽奖
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest
                        <li><a href="{{ route('login') }}">登录</a></li>
                        <li><a href="{{ route('register') }}">注册</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false" aria-haspopup="true" v-pre>
                                @if(Auth::user()->avatar)
                                    <img class="img-circle" src="{{ Auth::user()->avatar }}" alt="avatar" width="20" height="20">
                                @else
                                    <img class="img-circle" src="/img/avatar/unset.jpg" alt="avatar" width="20">
                                @endif
                                &nbsp;
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('user.profile', Auth::user()) }}">
                                        <i class="fa fa-user"></i>
                                        个人主页
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('user.edit', Auth::user()) }}">
                                        <i class="fa fa-edit"></i>
                                        编辑个人资料
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out-alt"></i>
                                        退出登录
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
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

    <div class="container">
        @include('layouts._messages')
        @yield('content')
    </div>
</div>


<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@yield('script')
</body>
</html>
