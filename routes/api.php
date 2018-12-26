<?php

use Illuminate\Http\Request;

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

// Vacations
Route::get('/all/{type?}', 'ApiController@all');
Route::put('/approve/{vacation_request_id}', 'ApiController@approve');
Route::put('/decline/{vacation_request_id}', 'ApiController@decline');
Route::delete('/{vacation_request_id}', 'ApiController@delete');
Route::post('/', 'ApiController@create');

// Users
Route::get('/users', 'ApiController@users');
Route::get('/users/{user_id}', 'ApiController@user');