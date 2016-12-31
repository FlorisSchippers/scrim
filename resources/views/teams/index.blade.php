@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <h1>All teams</h1>
            <ul>
                @foreach($teams as $team)
                    <li>
                        <a href="/teams/{{ $team->id }}">{{ $team->name }}</a>
                    </li>
                @endforeach
            </ul>

            <a href="/">Back to hub</a>
        </div>
    </div>
@stop