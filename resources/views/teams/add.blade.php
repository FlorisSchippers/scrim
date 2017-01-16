@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <form method="POST" action="/teams">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control"><br>
                    <button type="submit" name="submit" class="btn btn-primary">Create new team</button>
                </div>
            </form>
        </div>
    </div>
@stop