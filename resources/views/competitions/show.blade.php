@extends('layouts.app')

@section('title', '赛事详情 - '.$competition->name)

@section('style')
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

        {{-- 基本信息 --}}
        <div class="col-md-10">
            @include('competitions._competition_info')
        </div>
    </div>
@endsection


@section('script')
@endsection