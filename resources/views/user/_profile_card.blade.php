<div class="text-center" style="background:#fff">

    <div style="height: 20px;">
        {{-- 占位行 --}}
    </div>

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

    {{-- 身份 --}}
    <div class="row tips">
        @if($user->realname)
            <a type="button" class="label label-info"
               data-toggle="tooltip" title="用户身份">
                <i class="fa fa-user"></i>
                {{ $user->realname }}
            </a>
        @endif
    </div>

    {{-- 分割线 --}}
    <div class="row">
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
            <hr>
        </div>
    </div>

    {{-- 标签 --}}
    <div class="row tips">
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
            {{-- 邮箱 --}}
            <a type="button" class="label label-info"
               data-toggle="tooltip" title="{{ $user->email }}">
                <i class="fa fa-envelope"></i>
                E-Mail
            </a>

            {{-- WCA ID --}}
            @if ( $user->WCAID )
                <a type="button" class="label label-info"
                   data-toggle="tooltip" title="WCA ID" target="_blank"
                   href="https://cubingchina.com/results/person/{{ $user->WCAID }}">
                    <img class="wca-competition" src="/img/logo/wca.png"
                         alt="WCA赛事" width="10" height="10">
                    {{ $user->WCAID }}
                </a>
            @endif
        </div>
    </div>

    {{-- 分割线 --}}
    <div class="row">
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
            <hr>
        </div>
    </div>

    {{-- 个人简介 --}}
    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
        <p class="text-center">
            @if($user->introduction)
                {{ $user->introduction }}
            @else
                {{--个人简介为空--}}
            @endif
        </p>
        <div style="height: 10px;">
            {{-- 占位行 --}}
        </div>
    </div>

    {{-- 修改资料按钮 --}}
    <div class="row">
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
            <a class="btn btn-default btn-block" type="submit">
                <i class="fa fa-edit"></i>
                编辑个人资料
            </a>
        </div>
    </div>

    <div style="height: 20px;">
        {{-- 占位行 --}}
    </div>
</div>
