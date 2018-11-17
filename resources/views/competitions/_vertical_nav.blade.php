<div class="list-group" hidden>
    <a href="{{ route('competition.detail', $competition->id) }}"
       class="list-group-item {{ url()->current() == route('competition.detail', $competition->id) ? 'active' : '' }}">
        <i class="far fa-list-alt"></i>
        详细信息
    </a>
    <a href="{{ route('competition.signUp', $competition->id) }}"
       class="list-group-item {{ url()->current() == route('competition.signUp', $competition->id) ? 'active' : '' }}">
        <i class="fas fa-sign-in-alt"></i>
        我要报名
    </a>
    <a href="{{ route('competition.players', $competition->id) }}"
       class="list-group-item {{ url()->current() == route('competition.players', $competition->id) ? 'active' : '' }}">
        <i class="fas fa-users"></i>
        参赛选手
    </a>
    <a href="#" class="list-group-item ">
        <i class="fas fa-trophy"></i>
        赛果
    </a>
</div>


<div class="btn-group-vertical btn-block text-center" role="group" aria-label="" style="margin-bottom: 20px;">

    <a href="{{ route('competition.detail', $competition->id) }}"
       type="button"
       class="btn  {{ url()->current() == route('competition.detail', $competition->id) ? 'btn-primary' : 'btn-default' }}">
        <i class="far fa-list-alt"></i>
        详细信息
    </a>

    <a href="{{ route('competition.signUp', $competition->id) }}"
       type="button"
       class="btn {{ url()->current() == route('competition.signUp', $competition->id) ? 'btn-primary' : 'btn-default' }}">
        <i class="fas fa-sign-in-alt"></i>
        我要报名
    </a>
    <a href="{{ route('competition.players', $competition->id) }}"
       class="btn {{ url()->current() == route('competition.players', $competition->id) ? 'btn-primary' : 'btn-default' }}">
        <i class="fas fa-users"></i>
        参赛选手
    </a>
    <a href="#"
       class="btn {{ url()->current() == route('competition.players', $competition->id) ? 'btn-primary' : 'btn-default' }}">
        <i class="fas fa-trophy"></i>
        赛果
    </a>
</div>

<div class="admin-mng" style="margin-bottom: 20px;">
    <a href="#" class="btn btn-block btn-success">成绩录入</a>
    <a href="#" class="btn btn-block btn-warning">修改赛事</a>
    <a href="#" class="btn btn-block btn-danger">删除赛事</a>
</div>
