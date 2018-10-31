@extends('layouts.app')

@section('title', '编辑个人资料 - '. $user->name)

@section('style')
    @include('user._profile_card_style')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('user._profile_card', ['user' => $user])
        </div>

        {{-- 编辑资料面板 --}}
        <div class="col-md-9">

            <div class="panel panel-default col-md-12">
                {{-- 面板标题 --}}
                <div class="panel-heading">
                    <h3>
                        <i class="fa fa-edit"></i>
                        编辑个人资料
                    </h3>
                </div>
                {{-- 面板内容 --}}
                <div class="panel-body">
                    {{-- 错误提示 --}}
                    @include('layouts._errors')
                    {{-- 表单 --}}
                    <form action="{{ route('user.update', $user->id) }}" method="POST" accept-charset="UTF-8"
                          enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        {{-- 用户头像 --}}
                        <div class="form-group">
                            <label for="" class="avatar-label">用户头像</label>
                            <input type="file" name="avatar">
                            <br>
                            <p class="small text-warning">请尽量上传正方型图片，否则会造成挤压，后续将开放裁剪功能避开此问题</p>
                            @if($user->avatar)
                                <br>
                                <img class="thumbnail img-responsive" src="{{ $user->avatar }}" width="200"/>
                            @endif
                        </div>
                        {{-- 用户名 --}}
                        <div class="form-group">
                            <label for="name-field">
                                用户名
                                <b class="text-danger">*</b>
                            </label>
                            <input class="form-control" type="text" name="name" id="name-field"
                                   value="{{ old('name', $user->name) }}"/>
                            <p class="small text-warning">可用长度为 2-25 个字符</p>
                        </div>
                        {{-- 邮箱 --}}
                        <div class="form-group">
                            <label for="email-field">
                                邮 箱
                                <b class="text-danger">*</b>
                            </label>
                            <input class="form-control disabled" type="text" name="email" id="email-field"
                                   value="{{ old('email', $user->email) }}" readonly/>
                        </div>
                        {{-- WCA ID --}}
                        <div class="form-group">
                            <label for="WCAID-field">WCA ID</label>&nbsp;
                            <a data-toggle="tooltip" data-placement="right" title="填写该项会在个人资料卡中展示，并链接到粗饼网的个人主页">
                                <i class="far fa-question-circle"></i>
                            </a>
                            <input class="form-control" type="text" name="WCAID" id="WCAID-field"
                                   value="{{ old('WCAID', $user->WCAID) }}">
                            <p class="small text-warning">请填写真实有效的 WCA ID</p>
                        </div>
                        {{-- QQ --}}
                        <div class="form-group">
                            <label for="qq-field">QQ 号码</label>&nbsp;
                            <a data-toggle="tooltip" data-placement="right" title="填写该项会在个人资料卡中展示">
                                <i class="far fa-question-circle"></i>
                            </a>
                            <input class="form-control" type="text" name="qq" id="qq-field"
                                   value="{{ old('qq', $user->qq) }}">
                        </div>
                        {{-- 电话 --}}
                        <div class="form-group">
                            <label for="tel-field">联系电话</label>
                            <input class="form-control" type="text" name="tel" id="tel-field"
                                   value="{{ old('tel', $user->tel) }}">
                            <p class="small text-warning">该项为保密项，不对外公开显示</p>
                        </div>
                        {{-- 学号 --}}
                        <div class="form-group">
                            <label for="stuNum-field">学 号</label>&nbsp;
                            <input class="form-control" type="text" name="stuNum" id="stuNum-field"
                                   value="{{ old('stuNum', $user->stuNum) }}">
                            <p class="small text-warning">该项为保密项，不对外公开显示<br>江西师范大学学子方可填写，其他学校学子<b>请勿填写</b></p>
                        </div>
                        {{-- 简介 --}}
                        <div class="form-group">
                            <label for="introduction-field">个人简介</label>&nbsp;
                            <a data-toggle="tooltip" data-placement="right" title="填写该项会在个人资料卡中展示">
                                <i class="far fa-question-circle"></i>
                            </a>
                            <textarea name="introduction" id="introduction-field" class="form-control"
                                      rows="3">{{ old('introduction', $user->introduction) }}</textarea>
                        </div>
                        {{-- 保存按钮--}}
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="far fa-paper-plane"></i>
                                保存
                            </button>
                        </div>
                    </form>
                </div>
            </div>{{-- end div.panel --}}
        </div>{{-- end col-md-9 --}}
    </div>
@endsection


@section('script')
    @include('user._profile_card_script')
@endsection