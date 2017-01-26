@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <form method="POST" action="/scrims">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="team_id" value="{{ $user->team_id }}">
                <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                    <label for="date">Date</label>
                    <input type="date" name="date" class="form-control" value="{{ old('date') }}" required
                           autofocus>
                    @if ($errors->has('date'))
                        <span class="help-block"><strong>{{ $errors->first('date') }}</strong></span>
                    @endif
                </div>
                <hr>
                <div class="form-group{{ $errors->has('startTime') ? ' has-error' : '' }}">
                    <label for="startTime">Start time</label>
                    <input type="time" name="startTime" class="form-control" value="{{ old('startTime') }}" required
                           autofocus>
                    @if ($errors->has('startTime'))
                        <span class="help-block"><strong>{{ $errors->first('startTime') }}</strong></span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('endTime') ? ' has-error' : '' }}">
                    <label for="endTime">End time</label>
                    <input type="time" name="endTime" class="form-control" value="{{ old('endTime') }}" required
                           autofocus>
                    @if ($errors->has('endTime'))
                        <span class="help-block"><strong>{{ $errors->first('endTime') }}</strong></span>
                    @endif
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Add scrim opportunity</button>
            </form>
        </div>
    </div>
@stop