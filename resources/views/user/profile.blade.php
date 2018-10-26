@extends('layouts.app')

@section('title', '个人资料 - '. $user->name)

@section('style')
    img.avatar {
    border: 2px solid #d3d3d3;
    width: 100px!important;
    height: 100px!important;
    }

    img.avatar:hover {
    border-color: #9feee9;
    transition: all 0.3s;
    }
    .tips a.label {
    background-color: transparent;
    color: #636b6f;
    border: 1px solid #636b6f;
    border-radius: 10px;
    }

    .tips a.label:hover {
    color: #26292c;
    border: 1px solid #636b6f;
    border-radius: 10px;
    }
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="text-center" style="background:#fff">

                <div style="height: 20px;">
                    {{-- 占位行 --}}
                </div>
                {{--<div class="row">--}}

                {{-- 头像--}}
                @if ($user->avatar)
                    <img class="avatar img-circle" src="/img/logo/icon.png" alt="avatar">
                    {{--<img class="avatar img-rounded" src="/img/logo/icon.png" alt="avatar" width="100" height="100">--}}
                @else
                    <img class="avatar img-circle" src="/img/avatar/unset.jpg" alt="avatar">
                    {{--<img class="avatar img-rounded" src="/img/avatar/unset.jpg" alt="avatar" width="100" height="100">--}}
                @endif
                {{-- 用户名 --}}

                <h2>{{ $user->name }}</h2>

                {{-- 分割线 --}}
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
                        <hr>
                    </div>
                </div>

                {{-- 标签 --}}
                <div class="row tips">
                    {{-- 邮箱 --}}
                    <a type="button" class="label label-info"
                       data-toggle="tooltip" title="{{ $user->email }}">
                        <i class="glyphicon glyphicon-envelope"></i>
                        E-Mail
                    </a>

                    {{-- WCA ID --}}
                    @if ( $user->WCAID )
                        &nbsp;
                        <a type="button" class="label label-info"
                           data-toggle="tooltip" title="{{ $user->WCAID }}" target="_blank"
                           href="https://cubingchina.com/results/person/{{ $user->WCAID }}">
                            &nbsp;<img class="wca-competition" src="/img/logo/wca.png"
                                       alt="WCA赛事" width="15" height="15">
                            WCA ID&nbsp;
                        </a>
                    @endif
                </div>

                {{-- 分割线 --}}
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
                        <hr>
                    </div>
                </div>

                {{-- 个人简介 --}}
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
                    <p class="text-center">
                        @if($user->introduction)
                            {{ $user->introduction }}
                        @else
                            个人资料
                        @endif
                    </p>
                    <div style="height: 10px;">
                        {{-- 占位行 --}}
                    </div>
                </div>
                {{--</div>--}}

                {{-- 修改资料按钮 --}}
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xs-offset-3 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
                        <button class="btn btn-default btn-block" type="button">修改资料</button>
                    </div>
                </div>

                <div style="height: 20px;">
                    {{-- 占位行 --}}
                </div>
            </div>
        </div>

        <div class="col-md-8" style="background:#000;"></div>
    </div>
@endsection


@section('script')
    <script>
        $(function () {
            $("[data-toggle='tooltip']").tooltip();
        });
    </script>
@endsection