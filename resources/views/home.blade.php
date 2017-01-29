@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif
        <div class="col-md-8 col-md-offset-2">
            <div class="row">
                <h1 id="title">Welcome to Scrim.io</h1>
                <div class="col-md-4">
                    <a href="/users" id="hub-icon"><span class="glyphicon glyphicon-user"
                                                         aria-hidden="true"></span></a>
                    <a href="/users"><h3 style="text-align: center">Users</h3></a>
                </div>
                <div class="col-md-4">
                    <a href="/teams" id="hub-icon"><span class="glyphicon glyphicon-link"
                                                         aria-hidden="true"></span></a>
                    <a href="/teams"><h3 style="text-align: center">Teams</h3></a>
                </div>
                <div class="col-md-4">
                    <a href="/scrims" id="hub-icon"><span class="glyphicon glyphicon-knight"
                                                          aria-hidden="true"></span></a>
                    <a href="/scrims"><h3 style="text-align: center">Scrims</h3></a>
                </div>
            </div>
        </div>
    </div>
@stop