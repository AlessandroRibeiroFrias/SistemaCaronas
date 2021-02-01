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


Route::get('/endereco', 'App\Http\Controllers\ControllerEndereco@getEndereco');

Route::group(['prefix' => 'caroneiro'], function () {
    Route::get('', 'App\Http\Controllers\ControllerCaroneiro@index');
    Route::get('/{id_caroneiro}', 'App\Http\Controllers\ControllerCaroneiro@show')->where('id_caroneiro', '[0-9]+');
    Route::post('', 'App\Http\Controllers\ControllerCaroneiro@store');
    Route::put('/{id_caroneiro}', 'App\Http\Controllers\ControllerCaroneiro@update')->where('id_caroneiro', '[0-9]+');
    Route::delete('/{id_caroneiro}', 'App\Http\Controllers\ControllerCaroneiro@destroy')->where('id_caroneiro', '[0-9]+');
    Route::post('/carona', 'App\Http\Controllers\ControllerCaronaCaroneiro@store');
    Route::get('/carona/{id_carona_caroneiro}', 'App\Http\Controllers\ControllerCaronaCaroneiro@getCarona')->where('id_carona_caroneiro', '[0-9]+');
    Route::post('/solicitacao', 'App\Http\Controllers\ControllerCaronaCaroneiro@requestCarona');
    Route::get('/validacao/{id_solicitacao}', 'App\Http\Controllers\ControllerCaronaCaroneiro@getStatusCarona');
});

Route::group(['prefix' => 'motorista'], function () {
    Route::get('', 'App\Http\Controllers\ControllerMotorista@index');
    Route::get('/{id_motorista}', 'App\Http\Controllers\ControllerMotorista@show')->where('id_motorista', '[0-9]+');
    Route::post('', 'App\Http\Controllers\ControllerMotorista@store');
    Route::put('/{id_motorista}', 'App\Http\Controllers\ControllerMotorista@update')->where('id_motorista', '[0-9]+');
    Route::delete('/{id_motorista}', 'App\Http\Controllers\ControllerMotorista@destroy')->where('id_motorista', '[0-9]+');
    Route::get('/solicitacao/{id_motorista}', 'App\Http\Controllers\ControllerCaronaMotorista@getSolicitacao')->where('id_motorista', '[0-9]+');
    Route::post('/validacao', 'App\Http\Controllers\ControllerCaronaMotorista@requestValidacao');
});
