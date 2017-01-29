@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            @if(Session::has('teaminfo'))
                <div class="alert alert-info">
                    {{ Session::get('teaminfo') }}
                </div>
            @endif
            <h1>All teams</h1>
            <ul class="list-group">
                @foreach($teams as $team)
                    <li class="list-group-item">
                        <a href="/teams/{{ $team->id }}">
                            <img id="teamlist-image" src="{{ $team->image }}">{{ $team->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <a href="/">Back to hub</a>
        </div>
    </div>
@stop