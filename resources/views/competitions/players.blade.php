@extends('layouts.app')

@section('title', '参赛选手 - '.$competition->name)

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

        {{-- 选手列表 --}}
        <div class="col-md-10">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fas fa-users"></i>
                        参赛选手
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover text-center">
                            <thead>
                            <tr>
                                <th class="text-center">
                                    编号
                                </th>
                                <th class="text-center">
                                    姓名
                                </th>
                                @foreach($comp_events as $comp_event)
                                    <th class="text-center">
                                        <span class="cubing-icon event-{{ $comp_event->id }}" data-toggle="tooltip" data-placement="top" data-container="body"
                                              title="{{ $comp_event->name }}"
                                              data-original-title="{{ $comp_event->name }}">
                                        <span class="hidden-xs hidden-sm"> {{ $comp_event->name }}</span>
                                        </span>
                                    </th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            <?php $count = 1; ?>
                            @foreach($players as $player)
                                <tr>
                                    <td>
                                        {{ $count++ }}
                                    </td>
                                    <td>
                                        @if($player->user_id)
                                            <a href="{{ route('user.profile', $player->user_id) }}">
                                                {{ $player->realname }}
                                            </a>
                                        @else
                                            {{ $player->realname }}
                                        @endif
                                    </td>
                                    <?php $play_events = explode(' ', $player->applyEventSpecs); ?>
                                    @foreach($comp_events as $comp_event)
                                        <td>
                                            @if(in_array($comp_event->id, $play_events))
                                                <span class="cubing-icon event-{{ $comp_event->id }}"></span>
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel-footer">
                    {{ $competition->name }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('user._profile_card_script')
@endsection