@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <h1>{{ $scrim->team->name }} wants to scrim</h1>

            <ul class="list-group">
                <li class="list-group-item">On {{ $scrim->date }}</li>
                <li class="list-group-item">From {{ $scrim->startTime }}</li>
                <li class="list-group-item">To {{ $scrim->endTime }}</li>
            </ul>
            <hr>
            <ul class="list-group">
                @foreach($scrim->comments as $comment)
                    <li class="list-group-item"><span
                                style="font-weight: bold">{{ $comment->nickname }}</span>: {{ $comment->body }}</li>
                @endforeach
            </ul>
            @if($user->team_id != 0)
                <form method="post" action="/scrims/{{ $scrim->id }}/comment">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="scrim_id" value="{{ $scrim->id }}">
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <div class="form-group">
                        <label for="body">Comment</label>
                        <input type="text" name="body" class="form-control"><br>
                        <button type="submit" name="submit" class="btn btn-primary">Add comment</button>
                    </div>
                </form>
            @endif
            <hr>
            <h3><a href="/scrims">Back to all scrims</a></h3>
            <h5><a href="/">Back to hub</a></h5>
        </div>
    </div>
@stop