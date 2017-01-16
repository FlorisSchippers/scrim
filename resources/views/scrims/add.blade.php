@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <form method="POST" action="/scrims">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="team_id" value="{{ $user->team_id }}">
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" name="date" class="form-control">
                    <hr>
                    <label for="startTime">Start time</label>
                    <input type="time" name="startTime" class="form-control">
                    <label for="endTime">End time</label>
                    <input type="time" name="endTime" class="form-control"><br>
                    <button type="submit" name="submit" class="btn btn-primary">Add scrim opportunity</button>
                </div>
            </form>
        </div>
    </div>
@stop