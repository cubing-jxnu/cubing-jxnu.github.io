<div class="panel panel-info"
     style="font-family: '微软雅黑';">
    <div class="panel-heading">
        <h3 class="panel-title">
            <i class="fas fa-sign-in-alt"></i>
            报名表
        </h3>
    </div>
    <div class="panel-body">
        <form role="form">
            <div class="form-group">
                <label for="">姓名 <span class="must">*</span></label>
                <input type="text" class="form-control"
                       id="realname" name="realname"
                       placeholder="请填写真实姓名"/>
            </div>
            <?php dd($player); ?>
            <div class="form-group">
                <label for="">性别 <span class="must">*</span></label>
                {{--<input type="text" class="form-control" id="gender" name="gender"/>--}}
                <select class="form-control" name="gender" id="gender">
                    <option value="f"  >女</option>
                    <option value="m" >男</option>
                </select>
            </div>


            <div class="form-group">
                <label for="">出生生期 <span class="must">*</span></label>
                <input type="text" class="form-control" id="" name=""/>
                <p class="help-block">按照 "YYYY-MM-DD" 格式填写</p>
            </div>

            <div class="form-group">
                <label for="">国家 <span class="must">*</span></label>
                <input type="text" class="form-control" id="" name=""
                       placeholder="例：中国"/>
            </div>

            <div class="form-group">
                <label for="">省份 <span class="must">*</span></label>
                <input type="text" class="form-control" id="" name=""
                       placeholder="例：江西"/>
            </div>

            <div class="form-group">
                <label for="">城市 <span class="must">*</span></label>
                <input type="text" class="form-control" id="" name=""
                       placeholder="例：南昌"/>
            </div>


            <div class="form-group">
                <label for="">学校 <span class="must">*</span></label>
                <input type="text" class="form-control" id="" name=""
                       placeholder="例：江西师范大学"/>
            </div>

            <div class="form-group">
                <label for="">学院</label>
                <input type="text" class="form-control" id="" name=""
                       placeholder="非本校人员可不填"/>
            </div>

            <div class="form-group">
                <label for="">学号</label>
                <input type="text" class="form-control" id="" name=""
                       placeholder="非本校人员可不填"/>
            </div>

            <div class="form-group">
                <label>报名项目 <span class="must">*</span></label>
                <div class="btn-group btn-block text-center">
                    @foreach($comp_events as $comp_event)
                        <button class="btn btn-default cube-event" type="button"
                                value="{{ $comp_event->id }}"
                                title="报名费 {{ $comp_event->fee }} 元"
                                fee="{{ $comp_event->fee }}"
                                data-toggle="tooltip"
                                data-placement="bottom" data-container="body">
                            <span class="cubing-icon event-{{ $comp_event->id }}"></span>
                            <span>{{ $comp_event->name }}</span>
                        </button>
                    @endforeach
                    <button id="selectAll" class="btn btn-success" type="button">
                        <span>全部选择</span>
                    </button>

                    <div class="clearfix"></div>
                </div>


                <div class="form-group">
                    <label>备注信息</label>
                    <textarea class="form-control" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="far fa-paper-plane"></i>
                        提交
                    </button>&nbsp;&nbsp;&nbsp;&nbsp;
                    <span id="fee-msg" class="help-block must"></span>
                </div>
            </div>
        </form>
    </div>
</div>