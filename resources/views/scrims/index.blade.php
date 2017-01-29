@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            @if(Session::has('scriminfo'))
                <div class="alert alert-info">
                    {{ Session::get('scriminfo') }}
                </div>
            @endif
            <h1>All scrims</h1>
            <div class="row">
                <select class="select pull-right">
                    <option value="">@if(isset($date)) {{ $date }} @else Filter date @endif</option>
                    @if(isset($date))
                        <option value="remove">Remove filter</option> @endif
                    @foreach($scrimdates as $scrimdate)
                        <option value="{{ $scrimdate }}">{{ $scrimdate }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 no-padding">
                <ul class="list-group">
                    @foreach($scrims as $scrim)
                        <li class="list-group-item @if ($scrim->opponent_id) list-group-item-danger @else list-group-item-success @endif">{{ $scrim->date }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-9 no-padding">
                <ul class="list-group">
                    @foreach($scrims as $scrim)
                        <li class="list-group-item @if ($scrim->opponent_id) list-group-item-danger @else list-group-item-success @endif"><a href="/teams/{{ $scrim->team->id }}">{{ $scrim->team->name }}</a>
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