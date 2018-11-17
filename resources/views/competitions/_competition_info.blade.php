<div class="panel panel-info" style="font-family: '微软雅黑';">
    <div class="panel-heading">
        <h3 class="panel-title">
            <i class="far fa-list-alt"></i>
            详细信息 - {{ $competition->name }}
        </h3>
    </div>
    <div class="panel-body">
        <label>比赛时间</label>
        <p>
            <i class="fas fa-calendar-alt"></i>
            <?php
            $year = $competition->year;
            $month = $competition->month;
            $day = $competition->day;
            echo $year . '-' . $month . '-' . $day;

            if (!($competition->endDay == $day && $competition->endMonth == $month)) {
                echo ' ~ ';
                if (!$competition->endMonth == $month) {
                    echo $competition->endMonth . '-';
                }
                if (!$competition->endDay == $day) {
                    echo $competition->endDay;
                } else {
                    echo $day;
                }
            }
            ?>
        </p>

        <label>比赛地址</label>
        <p>
            <i class="fas fa-map-marker-alt"></i>
            {{ $competition->venueAddress }}，{{ $competition->venue }}，{{ $competition->venueDetails }}
        </p>

        <label>开设项目</label>
        <div class="row">
            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>
                                项目
                            </th>
                            <th>
                                轮次
                            </th>
                            <th>
                                赛制
                            </th>
                            <th>
                                报名费
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($events as $event)
                            <tr>
                                <td>
                                    <span class="cubing-icon event-{{ $event->id }}"></span>
                                    {{ $event->name }}
                                </td>
                                <td>
                                    {{ $event->round }} 轮
                                </td>
                                <td>
                                    {{ $event->format }}
                                </td>
                                <td>
                                    {{ $event->fee == 0 ? '无' : '￥'.$event->fee }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <label>报名人数限制</label>
        <p>{{ $competition->applicantLimit == 0 ? '无限制' : $competition->limit.' 人' }}</p>
        <label>补充信息</label>
        <p>{{ $competition->information }}</p>
    </div>
    <div class="panel-footer">
        主办：
        @foreach($organisers as $organiser)
            <i class="fas fa-user text-primary"></i>
            <a href="{{ route('user.profile',$organiser->id) }}" id="{{ $organiser->realname }}">{{ $organiser->realname }}</a>&nbsp;&nbsp;
        @endforeach
    </div>
</div>