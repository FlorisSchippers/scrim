<?php

Auth::routes();
Route::get('/', 'PagesController@home');
Route::get('/profile', 'UsersController@index');
Route::get('/teams', 'TeamsController@index');
Route::get('/teams/{team}', 'TeamsController@show');
Route::get('/scrims', 'ScrimsController@index');
Route::get('/scrims/{scrim}', 'ScrimsController@show');