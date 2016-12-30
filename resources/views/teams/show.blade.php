@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>{{ $team->name }}</h1>

            <ul class="list-group">
                @foreach($team->players as $player)
                    <li class="list-group-item">{{ $player->name }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@stop