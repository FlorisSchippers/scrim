@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <h1>All scrims</h1>
            <ul class="list-group">
                @foreach($scrims as $scrim)
                    <li class="list-group-item">
                        <a href="/scrims/{{ $scrim->id }}">{{ $scrim->team->name }} wants to scrim
                            from {{ $scrim->startTime }} until {{ $scrim->endTime }}</a>
                    </li>
                @endforeach
            </ul>

            <a href="/">Back to hub</a>
        </div>
    </div>
@stop