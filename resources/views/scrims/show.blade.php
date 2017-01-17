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
            @if($user->team_id != 0)
                <hr>
                <form method="post" action="/scrims/{{ $scrim->id }}/comment">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="user" value="{{ $user->id }}">
                    <div class="form-group">
                        <label for="comment">Comment</label>
                        <input type="text" name="comment" class="form-control"><br>
                        <button type="submit" name="submit" class="btn btn-primary">Add comment</button>
                    </div>
                </form>
            @endif

            <h3><a href="/scrims">Back to all scrims</a></h3>
            <h5><a href="/">Back to hub</a></h5>
        </div>
    </div>
@stop