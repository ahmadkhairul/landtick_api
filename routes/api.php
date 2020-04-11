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
Route::group(['prefix' => 'v1'], function () {
    //Authentication
    Route::post('register', 'AuthController@Register');
    Route::post('login', 'AuthController@Login');
    Route::get('auth', 'AuthController@AuthUser');

    //Stations
    Route::get('stations','StationController@index');
    Route::get('station/{offset}','StationController@limit');
    Route::post('station','StationController@store')->middleware('auth.token');
    Route::put('station/{id}','StationController@update')->middleware('auth.token');
    Route::delete('station/{id}','StationController@destroy')->middleware('auth.token');

    //Stations
    Route::get('tickets','TicketController@index');
    Route::get('ticket/{offset}','TicketController@limit');
});
