<?php

DB::listen(function($query) {
	var_dump($query->sql, $query->bindings);
});

Auth::routes();
Route::get('/', 'PagesController@home');
Route::get('/users', 'UsersController@index');
Route::get('/users/me', 'UsersController@me');
Route::get('/users/{user}', 'UsersController@show');
Route::get('/teams', 'TeamsController@index');
Route::get('/teams/{team}', 'TeamsController@show');
Route::get('/scrims', 'ScrimsController@index');
Route::get('/scrims/{scrim}', 'ScrimsController@show');