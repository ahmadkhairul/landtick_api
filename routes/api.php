<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Authentication
Route::post('register', 'AuthController@Register');
Route::post('login', 'AuthController@Login');
Route::get('auth', 'AuthController@AuthUser');

//Stations
Route::get('stations','StationController@index');
Route::get('station/{offset}','StationController@limit');
Route::post('station','StationController@store');
Route::put('station/{id}','StationController@update');
Route::delete('station/{id}','StationController@destroy');