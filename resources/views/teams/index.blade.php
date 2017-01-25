@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <h1>All teams</h1>
            <ul class="list-group">
                @foreach($teams as $team)
                    <li class="list-group-item" style="height:50px">
                        <a href="/teams/{{ $team->id }}">{{ $team->name }}</a><img src="{{ $team->image }}"
                                                                                   class="pull-right"
                                                                                   style="height: 50px; margin-top: -10px">
                    </li>
                @endforeach
            </ul>
            <a href="/">Back to hub</a>
        </div>
    </div>
@stop