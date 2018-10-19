@extends('layouts.app')

@section('title', '注册确认链接')

@section('content')
    <div class="container">
        <h1>感谢您在 Sample 网站进行注册！</h1>

        <p>
            请点击下面的链接完成注册：
            <a href="{{ route('confirm.email', $user->activation_token) }}">
                {{ route('confirm.email', $user->activation_token) }}
            </a>
        </p>

        <p>
            如果这不是您本人的操作，请忽略此邮件。
        </p>
    </div>
@endsection
