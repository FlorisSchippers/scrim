@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <form method="POST" action="/teams">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required
                           autofocus>
                    @if ($errors->has('name'))
                        <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('abbreviation') ? ' has-error' : '' }}">
                    <label for="abbreviation">Abbreviation</label>
                    <input type="text" name="abbreviation" class="form-control" value="{{ old('abbreviation') }}" required
                           autofocus>
                    @if ($errors->has('abbreviation'))
                        <span class="help-block"><strong>{{ $errors->first('abbreviation') }}</strong></span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                    <label for="image">Link to image</label>
                    <input type="text" name="image" class="form-control" value="{{ old('image') }}" required
                           autofocus>
                    @if ($errors->has('image'))
                        <span class="help-block"><strong>{{ $errors->first('image') }}</strong></span>
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary">Create new team</button>
                </div>
            </form>
        </div>
    </div>
@stop