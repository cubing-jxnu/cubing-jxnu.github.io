<div class="text-center profile-card">

    {{-- 头像--}}
    @if ($user->avatar)
        <img class="avatar img-circle" src="{{ $user->avatar }}" alt="avatar">
        {{--<img class="avatar img-rounded" src="/img/logo/icon.png" alt="avatar" width="100" height="100">--}}
    @else
        <img class="avatar img-circle" src="/img/avatar/unset.jpg" alt="avatar">
        {{--<img class="avatar img-rounded" src="/img/avatar/unset.jpg" alt="avatar" width="100" height="100">--}}
    @endif

    {{-- 用户名 --}}
    <h3 class="text-info bold">
        {{ $user->name }}
    </h3>

    {{-- 身份 --}}
    <div class="row tips">
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
            @foreach($identifies as $identify)
                <a type="button" class="label label-info"
                   data-toggle="tooltip" title="用户身份">
                    <i class="fa fa-user"></i>
                    {{ $identify->name }}
                </a>
            @endforeach
        </div>
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

            {{-- qq --}}
            @if ( $user->qq )
                <a type="button" class="label label-info"
                   data-toggle="tooltip" title="{{ $user->qq }}" target="_blank">
                    <i class="fab fa-qq"></i>
                    QQ
                </a>
            @endif

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
    @if($user->introduction)
        <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
                {{-- 个人简介 --}}
                <p><b>个人简介</b></p>
                <p class="small text-muted">{{ $user->introduction }}</p>

            </div>
        </div>
    @endif

    {{-- 修改资料按钮 --}}
    @if(Auth::user()->id === $user->id)
    <div class="row">
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">

            <a class="btn btn-info btn-block btn-profile-edit" type="submit" style="" href="{{ route('user.edit', Auth::user()) }}">
                <i class="fa fa-edit"></i>
                编辑个人资料
            </a>
        </div>
    </div>
    @endif
</div>
