@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="col-md-4">
                <ul class="list-group">
                    <li class="list-group-item">First and last name</li>
                    <li class="list-group-item">Nickname</li>
                    <li class="list-group-item">Email</li>
                    @if( $user->team_id )
                        <li class="list-group-item">Team</li>
                    @endif
                </ul>
            </div>
            <div class="col-md-8">
                <ul class="list-group">
                    <li class="list-group-item">{{ $user->name }}</li>
                    <li class="list-group-item">{{ $user->nickname }}</li>
                    <li class="list-group-item">{{ $user->email }}</li>
                    @if( $user->team_id )
                        <li class="list-group-item"><a href="/teams/{{ $user->team_id }}">{{ $user->team->name }}</a>
                        </li>
                    @endif
                </ul>
            </div>
            <hr class="col-md-12">
            <h3><a href="/users">Back to all users</a></h3>
            <h5><a href="/">Back to hub</a></h5>
        </div>
    </div>
@stop