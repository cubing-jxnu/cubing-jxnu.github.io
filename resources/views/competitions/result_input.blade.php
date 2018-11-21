@extends('layouts.app')

@section('title', '成绩录入 - '.$competition->name)

@section('style')
    @include('layouts._cubing_icon_css')
@endsection

@section('content')
    <div class="row">
        {{-- 页眉 --}}
        @include('competitions._page_header')
    
        {{-- 导航 --}}
        <div class="col-md-2">
            <div class="inputBox">
                <form id="infoForm" action="" method="post">
                    {{ csrf_field() }}
                    <h3>成绩录入</h3>
                    <div class="row">
                        <div class="form-group has-error col-md-6">
                            <label class="control-label">姓名</label>
                            <input id="player-name" type="text" class="form-control">
                        </div>
                        <div class="form-group has-error col-md-6">
                            <label class="control-label">姓名</label>
                            <input id="" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group has-error">
                        <label class="control-label">编号</label>
                        <input id="player-id" type="text" class="form-control" onkeypress="if(event.keyCode==13) playerIdInput(this);" name="personId">
                    </div>
                    <div class="form-group has-success">
                        <label class="control-label">成绩</label>
                        @for($i=0; $i<$event->format->expected_solve_count; $i++)
                        <div class="input-group" style="margin-bottom: 3px;">
                            <div class="input-group-addon">{{ ($i+1) }}</div>
                            <input id="player-score-{{ $i }}" type="text" class="form-control player-scores" onkeypress="if(event.keyCode==13) nextResultInput(this);">
                        </div>
                        @endfor
                    </div>
                    <input id="clearform" type="button" class="btn btn-warning" value="清空">
                    <input id="submit" type="button" class="btn btn-primary" value="提交">
                    <!-- <input id="" type="submit" class="btn btn-danger" value="提交"> -->
                    <div id="alertTip" class="alert"></div>
                </form>
            </div>

            @include('competitions._vertical_nav')
        </div>

        {{-- 基本信息 --}}
        <div class="col-md-10">
            <h2>{{ $event->name }} - 成绩列表</h2>
            <table id="result" class="table table-bordered table-hover table-responsive text-nowrap" style="font-family: 微软雅黑;">
                <thead>
                    <tr class="info">
                        <th>排名</th>
                        <th>编号</th>
                        <th>姓名</th>
                        <th>单次</th>
                        <th>平均</th>
                        <th>详细成绩</th>
                    </tr>
                </thead>
                <tbody id="result-body">
                    <tr>
                        <td>0</td>
                        <td>0</td>
                        <td>？？？</td>
                        <td>1.11</td>
                        <td>2.22</td>
                        <td>
                            <table width="100%">
                                <tr>
                                    <td width="20%">1.11</td>
                                    <td width="20%">2.22</td>
                                    <td width="20%">1.11</td>
                                    <td width="20%">2.22</td>
                                    <td width="20%">1.11</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    @foreach($players as $player)
                    <tr>
                        <td></td>
                        <td>{{ $player->number }}</td>
                        <td>{{ $player->realname }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

<?php 

if(!empty($_POST['personId']))
{
    dd($_POST['personId']);
}
?>

@endsection


@section('script')

    @include('competitions.result_input_js')
    <script type="text/javascript">

    $("#player-id").on("input",function(e){
        //获取input输入的值
        var inputVal = e.delegateTarget.value;
        var player_number = inputVal.trim();
        var players = new Array();
        @foreach($players as $player)
        players[{{ $player->number }}] = '{{ $player->realname }}';
        @endforeach

        if(players[player_number] != undefined){
            $("#player-name").val(players[player_number]);
        }
        else{
            $("#player-name").val('');
        }
        if($("#player-name").val() != ''){
            for(var i = 0; i < {{ $event->format->expected_solve_count }}; i++){
                $("#player-score-" + i).removeAttr("readonly");
            }
        }
        else{
            for(var i = 0; i < {{ $event->format->expected_solve_count }}; i++){
                $("#player-score-" + i).attr("readonly","readonly");
            }
        }
    });

    // function check() {
    //     // alert('#player-score-{{ $event->format->expected_solve_count - 1 }}');
    //     if(!$("#player-score-{{ $event->format->expected_solve_count - 1 }}").is(":focus")  || $("#player-name").val() == "" ){ 
    //         $("#player-id").focus(); 
    //         return false;//false:阻止提交表单 
    //     }
    // }

    $("#submit").click(function () {
        $("form").submit();
    });
    </script>
@endsection
