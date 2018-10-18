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
        height: 90vh;
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
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title">
                Only Cube
            </div>
            <p class="lead">有魔 · 方可转动世界</p>
        </div>
    </div>
 @endsection