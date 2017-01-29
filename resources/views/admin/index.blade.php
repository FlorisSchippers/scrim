@extends('layouts.app')

@section('header')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
@stop

@section('content')
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <table id="admin-table" class="display">
                <caption>User Overview</caption>
                <thead>
                <tr>
                    <th>User</th>
                    <th>Email</th>
                    <th>Admin</th>
                    <th>Active</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <input id="{{ $user->id }}" class="checkbox-admin" type="checkbox"
                                   @if($user->admin == true) checked @endif data-toggle="toggle">
                        </td>
                        <td>
                            <input id="{{ $user->id }}" class="checkbox-active" type="checkbox"
                                   @if($user->active == true) checked @endif data-toggle="toggle">
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <hr>
            <table id="teams-table" class="display">
                <caption>Teams Overview</caption>
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Players</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($teams as $team)
                    <tr>
                        <td>{{ $team->name }}</td>
                        <td>@foreach($team->users as $player){{ $player->nickname }} @endforeach</td>
                        <td>
                            <button onclick="deleteTeam({{ $team->id }})" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <a href="/">Back to hub</a>
        </div>
    </div>
@stop

@section('footer')
    <script src="http://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#admin-table').DataTable();
        });

        $(document).ready(function () {
            $('#active-table').DataTable();
        });

        $(document).ready(function () {
            $('#teams-table').DataTable();
        });

        $(function () {
            $('.checkbox-admin').change(function (e) {
                window.location.replace('/users/' + e.target.id + '/toggleAdmin');
            })
        });

        $(function () {
            $('.checkbox-active').change(function (e) {
                window.location.replace('/users/' + e.target.id + '/toggleActive');
            })
        });

        function deleteTeam(id) {
            window.location.replace('/teams/' + id + '/delete');
        }
    </script>
@stop