@extends('layout')

@section('content')
    <h1>All teams</h1>
    <ul>
        @foreach($teams as $team)
            <li>
                <a href="/teams/{{ $team->id }}">{{ $team->name }}</a>
            </li>
        @endforeach
    </ul>
@stop