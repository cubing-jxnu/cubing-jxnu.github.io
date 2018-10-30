@extends('layouts.app')

@section('title', 'Cubing师大抽奖系统')


@section('content')
    <div class="row text-center" style="margin-bottom: 20px;">
        <div class="col-lg-2 col-lg-offset-0 col-md-2 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
            <h3>参与列表</h3>
            <textarea id="players" rows="10" style="width: 100%;"></textarea>
            <p class="text-muted">一行输入一个名字</p>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion"
                           href="#collapseOne">
                            快捷填充
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                                <div class="input-group">
                                    <span class="input-group-addon">从</span>
                                    <input id="Player_begin" type="text" class="form-control" placeholder="1">
                                </div><!-- input-group --><br>
                                <div class="input-group">
                                    <span class="input-group-addon">到</span>
                                    <input id="Player_end" type="text" class="form-control" placeholder="20">
                                </div><!-- /input-group --><br>
                                <button class="btn btn-sm btn-primary btn-block" type="button" onclick="autoWrite()">
                                    开始填充
                                </button>
                            </div>
                        </div><!-- /.row -->
                    </div>
                </div>
            </div>


        </div>
        <div class="col-lg-8 col-lg-offset-0 col-md-8 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
            <h3 class="text-center">抽奖滚动栏</h3>
            <div class="jumbotron">
                <h1 id="winner-name" class=" text-center display-3">点击下方按钮抽奖</h1>
            </div>
            <input id="start" class="btn btn-primary btn-block btn-lg" type="button" value="抽 奖" onclick="roll()">
        </div>
        <div class="col-lg-2 col-lg-offset-0 col-md-2 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
            <h3>中奖名单</h3>
            {{--<textarea id="winning" readonly=""></textarea>--}}
            <div id="winning" class="table-responsive">
                <table class="table text-left table-condensed">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>中奖者</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

            <input id="resetRow" class="btn btn-danger float-right" type="button" value="重新开始"
                   onclick="resetLuckyDraw()">
        </div>
    </div>
@endsection

@section('script')
    <script>
        var flag = false;
        var haveplay = false;
        var pos = -1;
        var timer;
        var canRow = new Array();

        function changename() {
            var text = $("#players").val();
            var Arr = text.split("\n");
            for (var i = 0; i < Arr.length; i++) {

                if (Arr[canRow[i]] == '') {
                    canRow.splice(i, 1);
                    i--;
                }
            }


            pos = Math.floor(Math.random() * canRow.length);
            if (Arr.length == 0 || canRow.length == 0) {
                clearInterval(timer);
                flag = false;
            }
            else {
                $("#winner-name").html(Arr[canRow[pos]]);
            }
        }

        function delRows(therow) {
            canRow.splice(therow, 1);

        }

        function roll() {
            if (haveplay == false) {
                if ($("#players").val() == '')
                    return;
                haveplay = true;
                $("#onplayer").val($("#players").val());
                $("#players").attr("readonly", "readonly");
                canRow.splice(0, canRow.length);
                var text = $("#players").val();
                var Arr = text.split("\n");
                for (var i = 0; i < Arr.length; i++) {
                    canRow.push(i);
                }
            }

            if (flag == false) {
                flag = true;
                timer = setInterval(changename, 50);
                $("#start").val('停!').removeClass('btn-primary').addClass('btn-warning');
            }
            else {
                $("#start").val('抽 奖').removeClass('btn-warning').addClass('btn-primary');
                flag = false;
                clearInterval(timer);
                if ($("#winner-name").html() != '' && canRow.length != 0) {
                    delRows(pos);
                    var winnertext = $("#winning").val();
                    // $("#winning").val(winnertext + $("#winner-name").html() + '\n');
                    var count = $("#winning table tbody").children().length;
                    // ++count;
                    var td = "<tr><td>" + (++count) + "</td><td><b>" + $("#winner-name").html() + "</b></td></tr>"
                    $("#winning table tbody").append(td);
                }
            }
        }

        function resetLuckyDraw() {
            clearInterval(timer);
            $("#winner-name").html("点击下方按钮抽奖");
            $("#players").removeAttr("readonly");
            $("#winning table tbody").empty();
            haveplay = false;
        }

        //自动填充数字
        function autoWrite() {
            //清空输入框
            $("#players").val('');
            //获取快捷输入的值
            var begin = $("#Player_begin").val();
            var end = $("#Player_end").val();
            //填充输入框
            if (begin - 0 !== NaN && end - 0 !== NaN && begin - end <= 0) {
                for (var i = begin; i <= end; i++) {
                    var preVal = $("#players").val();
                    $("#players").val(preVal + i + '\n');
                }
            }
        }
    </script>
@endsection
