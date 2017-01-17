@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <h1>{{ $team->name }}</h1>
            <hr>
            <h2>
                Players
                @if ($user->team_id != $team->id)
                    <a href="/teams/{{ $team->id }}/join" class="pull-right" style="margin-right: 14px"><h4><span
                                    class="glyphicon glyphicon-plus-sign"
                                    aria-hidden="true"></span></h4></a>
                @endif
            </h2>
            <ul class="list-group">
                @foreach($team->users as $member)
                    <li class="list-group-item">
                        <a href="/users/{{ $member->id }}">{{ $member->nickname }}</a>
                    </li>
                @endforeach
            </ul>
            <hr>
            <h2>
                Scrims
                @if ($user->team_id == $team->id)
                    <a href="/scrims/add" class="pull-right" style="margin-right: 14px"><h4><span
                                    class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></h4></a>
                @endif
            </h2>
            <ul class="list-group">
                @foreach($team->scrims as $scrim)
                    <li class="list-group-item"><a href="/scrims/{{ $scrim->id }}">{{ $scrim->date }}
                            from {{ $scrim->startTime }} until {{ $scrim->endTime }}</a>
                        @if ($user->team_id == $team->id)
                            <a href="/scrims/{{ $scrim->id }}/remove" class="pull-right"><span
                                        class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
                        @endif
                    </li>
                @endforeach
            </ul>

            <h3><a href="/teams">Back to all teams</a></h3>
            <h5><a href="/">Back to hub</a></h5>
        </div>
    </div>
@stop