<?php

use Illuminate\Http\Request;
use App\Models\Actor;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Route::middleware('auth:api')->get('/user', function (Request $request) { */
/*     return $request->user(); */
/* }); */

Route::group(['prefix' => 'actors'], function()
{	
	Route::get('/', 'ActorController@index');
	Route::get('/{id}', 'ActorController@show');
	Route::post('/search', 'ActorController@search');
	Route::post('/', 'ActorController@store');
	Route::put('/{id}', 'ActorController@update');
	Route::delete('/{id}', 'ActorController@delete');
});
Route::resource('actors', 'ActorController');

Route::group(['prefix' => 'movies'], function()
{	
	Route::get('/', 'MovieController@index');
	Route::get('/{id}', 'MovieController@show');
	Route::post('/search', 'MovieController@search');
	Route::post('/', 'MovieController@store');
	Route::put('/{id}', 'MovieController@update');
	Route::delete('/{id}', 'MovieController@delete');
});
Route::resource('movie', 'MovieController');

Route::group(['prefix' => 'producer'], function()
{	
	Route::get('', 'ProducerController@index');
	Route::get('/{id}', 'ProducerController@show');
	Route::post('/search', 'ProducerController@search');
	Route::post('/', 'ProducerController@store');
	Route::put('/{id}', 'ProducerController@update');
	Route::delete('/{id}', 'ProducerController@delete');
});
Route::resource('producer', 'ProducerController');
