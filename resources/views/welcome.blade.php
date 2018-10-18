@extends('layouts.app')

@section('title', '江西师范大学 Cubing 魔方协会')

@section('links')
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
@endsection

@section('style')
<!-- Styles -->
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Raleway', sans-serif;
        font-weight: 100;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 85vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 75px;
    }
@endsection

 @section('content')
 <!-- 粒子背景插件 -->
    <script color="0,0,0" opacity="0.7" count="40" src="https://cdn.bootcss.com/canvas-nest.js/1.0.1/canvas-nest.js" type="text/javascript" charset="utf-8"></script>

    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title">
                Only Cube
            </div>
            <p class="lead">有魔 · 方可转动世界</p>
        </div>
    </div>
 @endsection