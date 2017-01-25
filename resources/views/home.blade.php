@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="row">
                <h1> Welcome to Scrim.io </h1>
                <br>
                <br>
                <br>
                <div class="col-md-4">
                    <a href="/users"><span class="glyphicon glyphicon-user"
                                           style="display: block; text-align: center; font-size: 200px"
                                           aria-hidden="true"></span></a>
                    <br>
                    <a href="/users"><h3 style="text-align: center">Users</h3></a>
                </div>
                <div class="col-md-4">
                    <a href="/teams"><span class="glyphicon glyphicon-link"
                                           style="display: block; text-align: center; font-size: 200px"
                                           aria-hidden="true"></span></a>
                    <br>
                    <a href="/teams"><h3 style="text-align: center">Teams</h3></a>
                </div>
                <div class="col-md-4">
                    <a href="/scrims"><span class="glyphicon glyphicon-knight"
                                            style="display: block; text-align: center; font-size: 200px"
                                            aria-hidden="true"></span></a>
                    <br>
                    <a href="/scrims"><h3 style="text-align: center">Scrims</h3></a>
                </div>
            </div>
        </div>
    </div>
@stop