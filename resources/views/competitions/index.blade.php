@extends('layouts.app')

@section('title', '赛事列表')

@section('style')

@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">

                <table class="table table-striped table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>
                            日期
                        </th>
                        <th>
                            比赛名称
                        </th>
                        <th>
                            报名截至时间
                        </th>
                        <th>
                            地点
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($competitions as $competition)
                        <tr class="info">
                            <td>
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
                            </td>
                            <td>
                                <a href="{{ route('competition.detail',$competition->id) }}">{{ $competition->name }}</a>
                            </td>
                            <td>
                                {{ $competition->applyEnd_at }}
                            </td>
                            <td>
                                {{ $competition->venue }}
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


@section('script')
@endsection