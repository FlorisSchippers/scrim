@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8 col-md-offset-2" id="hier">
            <h1>All scrims</h1>
            <div class="row">
                <select class="select pull-right" style="margin-bottom: 10px">
                    <option value="">@if(isset($date)) {{ $date }} @else Filter date @endif</option>
                    @if(isset($date))
                        <option value="remove">Remove filter</option> @endif
                    @foreach($scrimdates as $scrimdate)
                        <option value="{{ $scrimdate }}">{{ $scrimdate }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3" style="padding: 0">
                <ul class="list-group">
                    @foreach($scrims as $scrim)
                        <li class="list-group-item">{{ $scrim->date }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-9" style="padding: 0">
                <ul class="list-group">
                    @foreach($scrims as $scrim)
                        <li class="list-group-item"><a href="/teams/{{ $scrim->team->id }}">{{ $scrim->team->name }}</a>
                            <a href="/scrims/{{ $scrim->id }}">wants to scrim from {{ $scrim->startTime }}
                                until {{ $scrim->endTime }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="row"></div>
            <a href="/">Back to hub</a>
        </div>
    </div>
@stop

@section('footer')
    <script>
        $(function () {
            $('.select').change(function (e) {
                if (e.target.value == 'remove') {
                    window.location.replace('/scrims');
                } else {
                    window.location.replace('/scrims/filter/' + e.target.value);
                }
            })
        });
    </script>
@stop