<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layout._header');
});
Route::get('/top', function () {
    return view('welcome');
});

Route::resource('interviews', 'InterviewController');

Route::resource('gangs', 'GangController');

Route::resource('services', 'ServiceController');

Route::get('login', 'SessionsController@create')->name('login');

Route::post('login', 'SessionsController@store')->name('login');

Route::delete('logout', 'SessionsController@destroy')->name('logout');

Route::resource('users', 'UserController');

Route::resource('cars', 'CarController');

Route::post('cars/{car}/save', 'CarController@save')->name('save');

Route::get('cars/{car}/end', 'CarController@end')->name('end');

Route::resource('drivers', 'DriverController');

Route::resource('strokes', 'StrokeController');

Route::resource('rooms','RoomController');