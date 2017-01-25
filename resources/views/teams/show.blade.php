@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <img src="{{ $team->image }}" style="width: 200px; margin: auto; float:right">
            <h1>{{ $team->name }}</h1>
            <br>
            <hr>
            <br>
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
            <br>
            <hr>
            <br>
            <h2>
                Scrims
                @if ($user->team_id == $team->id)
                    <a href="/scrims/add" class="pull-right" style="margin-right: 14px"><h4><span
                                    class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></h4></a>
                @endif
            </h2>
            <div class="col-md-3" style="padding: 0">
                <ul class="list-group">
                    @foreach($team->scrims as $scrim)
                        <li class="list-group-item">{{ $scrim->date }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-9" style="padding: 0">
                <ul class="list-group">
                    @foreach($team->scrims as $scrim)
                        <li class="list-group-item"><a href="/scrims/{{ $scrim->id }}">From {{ $scrim->startTime }} until {{ $scrim->endTime }}</a>
                            @if ($user->team_id == $team->id)
                                <a href="/scrims/{{ $scrim->id }}/remove" class="pull-right"><span
                                            class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="row"></div>
            <br>
            <hr>
            <br>
            <h3><a href="/teams">Back to all teams</a></h3>
            <h5><a href="/">Back to hub</a></h5>
        </div>
    </div>
@stop