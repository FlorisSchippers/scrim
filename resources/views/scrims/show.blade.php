@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>{{ $scrim->team->name }} wants to scrim</h1>

            <ul class="list-group">
                <li class="list-group-item">From {{ $scrim->startTime }}</li>
                <li class="list-group-item">To {{ $scrim->endTime }}</li>
            </ul>

            <h3><a href="/scrims">Back to all scrims</a></h3>
            <h5><a href="/">Back to hub</a></h5>
        </div>
    </div>
@stop