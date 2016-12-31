@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <h1>{{ $team->name }}</h1>

            <h2>Players</h2>
            <ul class="list-group">
                @foreach($team->players as $player)
                    <li class="list-group-item">{{ $player->name }}</li>
                @endforeach
            </ul>

            <h2>Scrims</h2>
            <ul class="list-group">
                @foreach($team->scrims as $scrim)
                    <li class="list-group-item">{{ $scrim->startTime }}</li>
                @endforeach
            </ul>

            <h3><a href="/teams">Back to all teams</a></h3>
            <h5><a href="/">Back to hub</a></h5>
        </div>
    </div>
@stop