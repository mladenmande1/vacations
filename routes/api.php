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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/all/{type?}', 'ApiController@all');
Route::post('/approve/{vacation_request_id}', 'ApiController@approve');
Route::post('/decline/{vacation_request_id}', 'ApiController@decline');
Route::post('/', 'ApiController@save');