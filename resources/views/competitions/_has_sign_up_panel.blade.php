<div class="panel panel-info" style="font-family: '微软雅黑';">
    <div class="panel-heading">
        <h3 class="panel-title">
            <i class="fas fa-sign-in-alt"></i>
            报名表
        </h3>
    </div>
    <div class="panel-body">
        <div class="">
            <p></p>
            <label>您已报名成功，已报的项目有</label>
            <p>
                <?php $last_event = end($player->events) ?>
                @foreach($player->events as $event)

                <span class="text-info">
                    <span class="cubing-icon event-{{ $event->id }}"></span>
                    <span>{{ $event->name }}</span>{{ ($last_event == $event) ? '' : '，' }}
                </span>

            @endforeach
            </p>
        </div>
    </div>
</div>