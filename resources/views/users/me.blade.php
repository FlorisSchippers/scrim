@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="col-md-4" style="padding: 0">
                <ul class="list-group">
                    <li class="list-group-item">First and last name</li>
                    <li class="list-group-item">Nickname</li>
                    <li class="list-group-item">Email</li>
                    <li class="list-group-item">Rating</li>
                    <li class="list-group-item">Team</li>
                </ul>
            </div>
            <div class="col-md-8" style="padding: 0">
                <ul class="list-group">
                    <li class="list-group-item">{{ $user->name }}</li>
                    <li class="list-group-item">{{ $user->nickname }}</li>
                    <li class="list-group-item">{{ $user->email }}</li>
                    <li class="list-group-item">{{ $user->rating }}MMR</li>
                    @if( $user->team_id )
                        <li class="list-group-item"><a href="/teams/{{ $user->team_id }}">{{ $user->team->name }}</a>
                            <a href="/users/leave" class="pull-right">
                                <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a>
                        </li>
                    @else
                        <li class="list-group-item"><a href="/teams/add">Create a new team</a></li>
                    @endif
                </ul>
            </div>
            <a href="/">Back to hub</a>
        </div>
    </div>
@stop