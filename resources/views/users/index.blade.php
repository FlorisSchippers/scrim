@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <h1>All users</h1>
            <ul class="list-group">
                @foreach($users as $user)
                    <li class="list-group-item">
                        <a href="/users/{{ $user->id }}">{{ $user->nickname }}</a>
                    </li>
                @endforeach
            </ul>

            <a href="/">Back to hub</a>
        </div>
    </div>
@stop