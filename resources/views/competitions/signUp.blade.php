@extends('layouts.app')

@section('title', '报名比赛 - '.$competition->name)

@section('style')
    .cube-event {
    margin-bottom: 3px;
    }
    .cube-event.active {
    background-color:#2ab27b;
    border-color: #2da061;
    }
    span.must {
    color: #ff6666;
    }
    @include('layouts._cubing_icon_css')
@endsection

@section('content')
    <div class="row">
        {{-- 页眉 --}}
        @include('competitions._page_header')

        {{-- 导航 --}}
        <div class="col-md-2">
            @include('competitions._vertical_nav')
        </div>

        {{-- 报名 --}}
        <div class="col-md-10">
            @if($player && $player->is_sign_up)
                {{-- 已报名 --}}
                @include('competitions._has_sign_up_panel')
            @else
                {{-- 未报名 --}}
                @include('competitions._want_sign_up_panel')
            @endif

        </div>
    </div>
@endsection


@section('script')
    <script>
        $('.cube-event').click(function () {//给id为btn的元素添加点击事件
            $(this).toggleClass('active');//每次点击的时候，将当前的元素切换active样式
            $(this).toggleClass('btn-success');
            if ($('.cube-event.active').length < $('.cube-event').length) {
                $('#selectAll').html('全部选择');
            } else {
                $('#selectAll').html('取消全选');
            }
            countFee();
        });

        $('#selectAll').click(function selectAll() {
            if ($('.cube-event.active').length < $('.cube-event').length) {
                $(this).html('取消全选');
                $('.cube-event').addClass('active').addClass('btn-success');
            } else {
                $(this).html('全部选择');
                $('.cube-event').removeClass('active').removeClass('btn-success');
            }
            countFee();
        });

        function countFee() {
            var money = 0;
            $('.cube-event.active').each(function () {
                money += ($(this).attr('fee')) * 1;
            });
            $('#fee-msg').html('共计报名费 ' + money + ' 元');
        };
    </script>
    @include('user._profile_card_script')
@endsection