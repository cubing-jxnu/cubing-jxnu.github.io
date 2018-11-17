@extends('layouts.app')

@section('title', '个人资料 - '. $user->name)

@section('style')
    {{--<style>--}}
    @include('user._profile_card_style')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('user._profile_card', ['user' => $user])
        </div>

        <div class="col-md-9">

        </div>
    </div>
@endsection


@section('script')
    @include('user._profile_card_script')
@endsection