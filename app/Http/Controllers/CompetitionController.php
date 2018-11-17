<?php

namespace App\Http\Controllers;

use App\Models\User;
//use Illuminate\Http\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRequest;

class CompetitionController extends Controller
{

    public function __construct()
    {
        //
    }

    public function index()
    {
        //列出所有赛事
        $competitions = DB::table('competitions_copy1')->paginate(20);
        return view('competitions.index', [
            'competitions' => $competitions,
        ]);
    }

    public function show($id)
    {
        $hosts = [];
        $events = [];

        $competition = $this->getCompetition($id);
        $events = $this->getEvents($competition);

        if ($competition->organiser) {
            $hosts_id = explode(' ', $competition->organiser);

            foreach ($hosts_id as $host_id) {
                $hosts[] = DB::table('users')->find($host_id);
            }
        }

        $organisers = $this->getOrganiser($competition);


        return view('competitions.show', [
            'competition' => $competition,
            'events' => $events,
            'organisers' => $organisers,
        ]);
    }

    public function signUp($id)
    {
        $competition = $this->getCompetition($id);
        $comp_events = $this->getEvents($competition);

        $person = $this->getPerson();


        if (!$this->fillInfo()) {
//            return 补全信息界面
        } else { //有参赛资格
            $person = $this->hasSignUp($competition->id, $this->fillInfo()->id);
            if ($person) {
                // 已报名
                $person->is_sign_up = true;


                $items = explode(' ', $person->applyEventSpecs); // 将 eventSpecs 字段分割为数组
                foreach ($items as $item) {
                    $event = DB::table('events')->where('id', '=', $item)->first();
                    $events[] = $event;
                }
                // 按照 event 的 rank 级别排序
                $person->events = array_sort($events, 'rank');
            } else {
                // 未报名
                $person->is_sign_up = false;
            }
        }

        $player = $person;


        return view('competitions.signUp', [
            'competition' => $competition,
            'comp_events' => $comp_events,
            'player' => $player,
        ])->with('success', 'sdf');
//        return redirect()
//            ->route('user.profile', Auth::user()->id)
//            ->with('success', '您已报名成功，无需重复报名！');
    }

    public function register(Request $request)
    {

    }

    public function players($id)
    {
        $competition = $this->getCompetition($id);
        $comp_events = $this->getEvents($competition);

        $players = $this->getPlayers($id);


        return view('competitions.players', [
            'competition' => $competition,
            'comp_events' => $comp_events,
            'players' => $players,
        ]);
    }


    public function destroy()
    {
        //
    }


    /**
     * 是否补全报名所需要的信息
     * @return null
     */
    private function fillInfo()
    {
        $person = DB::table('persons')
            ->where('user_id', '=', Auth::user()->id)
            ->first();
        if ($person->realname && $person->birth) {
            return $person;
        } else {
            return null;
        }
    }


    private function hasSignUp($competitionId, $personId)
    {
        $person_sign_up = DB::table('sign_up')
            ->join('persons', 'persons.id', '=', 'sign_up.personId')
            ->where('competitionId', '=', $competitionId)
            ->where('status', '=', 1)
            ->where('sign_up.personId', '=', $personId)
            ->select('persons.*', 'sign_up.apply_at', 'sign_up.applyEventSpecs', 'sign_up.comment')
            ->first();
        if ($person_sign_up) {
            //已经报名了
            //将报名项目进行处理返回
            return $person_sign_up;
        }
        return false;

    }


    private function getPerson()
    {
        $person = DB::table('persons')
            ->where('user_id', '=', Auth::user()->id)
            ->first();
        if ($person == null) {
            return null;
        }
        return $person;
    }




    //已填写信息 未报名

    /**
     * @param $competitionId string 比赛Id
     * @return mixed
     */
    private function getPlayer($competitionId)
    {
        $player = DB::table('persons')
            ->where('user_id', '=', Auth::user()->id)
            ->first();
        return $player;
    }


    /**
     * @param $competition object 单条比赛
     * @return array 该场比赛主办方
     */
    private function getOrganiser($competition)
    {
        $organisers = explode(' ', $competition->organiser);
        $organisers = DB::table('users')
            ->join('persons', 'persons.user_id', 'users.id')
            ->whereIn('users.id', $organisers)
            ->select('users.*', 'persons.realname as realname', 'users.realname as realName')
            ->get();
        return $organisers;
    }

    /**
     * @param $competitionId string 比赛ID
     * @return mixed 返回审核通过的参赛选手
     */
    private function getPlayers($competitionId)
    {
        $players = DB::table('sign_up')
            ->join('persons', 'persons.id', '=', 'sign_up.personId')
            ->where('competitionId', '=', $competitionId)
            ->where('status', '=', 1)
            ->select('persons.*', 'sign_up.apply_at', 'sign_up.applyEventSpecs', 'sign_up.comment')
            ->orderBy('sign_up.apply_at', 'ASC')
            ->get();

        return $players;
    }

    /**
     * @param $competitionId string 比赛ID
     * @return mixed 返回单条比赛
     */
    private function getCompetition($competitionId)
    {
        $competition = DB::table('competitions_copy1')->find($competitionId);
        return $competition;
    }

    /**
     * @param $competition object 单条比赛
     * @return array 返回该比赛所开设的项目（项目id、项目中文名、项目轮次、录入规则、项目报名费）
     */
    private function getEvents($competition)
    {
        $events = [];
        // 从 eventSpecs 字段中分割字符串提取：
        // $info[0]项目id、[1]项目轮次、[2]录入规则、[3]项目报名费
        $items = explode(' ', $competition->eventSpecs); // 将 eventSpecs 字段分割为数组
        foreach ($items as $item) {
            $info = explode(':', $item);
            // 查询 event
            $event = DB::table('events')->where('id', '=', $info[0])->first();
            // [1]查询轮次对应的中文名称
            $round = $info[1];
            // [2]查询录入规则对应中文名称
            $format = DB::table('formats')->where('id', '=', $info[2])->first()->name;

            $event->round = $round;
            $event->format = $format;
            $event->fee = $info[3];
            $events[] = $event;
        }
        // 按照 event 的 rank 级别排序
        $events = array_sort($events, 'rank');

        return $events;
    }
}
