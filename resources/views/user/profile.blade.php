@extends('layouts.app')

@section('title', '个人资料 - '. $user->name)

@section('style')
    {{--<style>--}}
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
    margin: 5px;
    display: inline-block;
    }

    .tips a.label:hover {
    color: #eeeeee;
    background-color: #2a2a2a;
    border: 1px solid #636b6f;
    border-radius: 10px;
    }
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('user._profile_card', ['user' => $user])
        </div>

        <div class="col-md-9" style="background:#000;"></div>
    </div>
@endsection


@section('script')
    <script>
        $(function () {
            $("[data-toggle='tooltip']").tooltip();
        });
    </script>
@endsection