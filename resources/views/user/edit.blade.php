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

        <div class="col-md-9">

            <div class="panel panel-default col-md-12">
                <div class="panel-heading">
                    <h3>
                        <i class="fa fa-edit"></i>
                        编辑个人资料
                    </h3>
                </div>
                <div class="panel-body">

                    @include('layouts._errors')

                    <form action="{{ route('user.update', $user->id) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="" class="avatar-label">用户头像</label>
                            <input type="file" name="avatar">
                            <p class="small text-warning">请尽量上传正方型图片，否则会造成挤压，后续将开放裁剪功能避开此问题</p>
                            @if($user->avatar)
                                <br>
                                <img class="thumbnail img-responsive" src="{{ $user->avatar }}" width="200" />
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="name-field">
                                用户名
                                <b class="text-danger">*</b>
                            </label>
                            <input class="form-control" type="text" name="name" id="name-field"
                                   value="{{ old('name', $user->name) }}"/>
                            <p class="small text-warning">可用长度为 2-25 个字符</p>
                        </div>

                        <div class="form-group">
                            <label for="email-field">
                                邮 箱
                                <b class="text-danger">*</b>
                            </label>
                            <input class="form-control disabled" type="text" name="email" id="email-field"
                                   value="{{ old('email', $user->email) }}" readonly/>
                        </div>

                        <div class="form-group">
                            <label for="WCAID-field">WCA ID</label>
                            <input class="form-control" type="text" name="WCAID" id="WCAID-field"
                                   value="{{ old('WCAID', $user->WCAID) }}">
                            <p class="small text-warning">请填写真实有效的 WCA ID，若无请忽略</p>

                        </div>

                        <div class="form-group">
                            <label for="qq-field">QQ 号码</label>
                            <input class="form-control" type="text" name="qq" id="qq-field"
                                   value="{{ old('qq', $user->qq) }}">
                        </div>

                        <div class="form-group">
                            <label for="tel-field">联系电话</label>
                            <input class="form-control" type="text" name="tel" id="tel-field"
                                   value="{{ old('tel', $user->tel) }}">
                        </div>

                        <div class="form-group">
                            <label for="stuNum-field">学 号</label>
                            <input class="form-control" type="text" name="stuNum" id="stuNum-field"
                                   value="{{ old('stuNum', $user->stuNum) }}">
                            <p class="small text-warning">江西师范大学学子方可填写，其他学校学子请勿填写<br>该项为保密项，仅自己可见</p>
                        </div>
                        <div class="form-group">
                            <label for="introduction-field">个人简介</label>
                            <textarea name="introduction" id="introduction-field" class="form-control"
                                      rows="3">{{ old('introduction', $user->introduction) }}</textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">保存</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection


@section('script')
    @include('user._profile_card_script')
@endsection