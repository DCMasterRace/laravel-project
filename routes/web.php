<?php

use Illuminate\Http\Request;
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
    return view('home');
});

Route::get('/movies', 'MovieController@index');

Route::get('/actors', 'ActorController@index');

Route::get('/producers', 'ProducerController@index');

Route::get('/foo', function () {
    return view('welcome');
});
