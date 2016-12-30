@extends('layout')

@section('content')
    <h1>All scrims</h1>
    <ul>
        @foreach($scrims as $scrim)
            <li>
                <a href="/scrims/{{ $scrim->id }}">{{ $scrim->team->name }} wants to scrim from {{ $scrim->startTime }}
                    to {{ $scrim->endTime }}</a>
            </li>
        @endforeach
    </ul>

    <a href="/">Back to hub</a>
@stop