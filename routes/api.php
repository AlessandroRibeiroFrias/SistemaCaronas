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
    Route::get('/{id_caroneiro}', 'App\Http\Controllers\ControllerCaroneiro@show');
    Route::post('', 'App\Http\Controllers\ControllerCaroneiro@store');
    Route::put('/{id_caroneiro}', 'App\Http\Controllers\ControllerCaroneiro@update');
    Route::delete('/{id_caroneiro}', 'App\Http\Controllers\ControllerCaroneiro@destroy');
    Route::get('/carona/{id_carona_caroneiro}', 'App\Http\Controllers\ControllerCaronaCaroneiro@getCarona');
});

Route::group(['prefix' => 'endereco'], function () {
    Route::get('', 'App\Http\Controllers\ControllerEndereco@index');
    Route::get('/{id_endereco}', 'App\Http\Controllers\ControllerEndereco@show');
    Route::post('', 'App\Http\Controllers\ControllerEndereco@store');
    Route::put('/{id_endereco}', 'App\Http\Controllers\ControllerEndereco@update');
    Route::delete('/{id_endereco}', 'App\Http\Controllers\ControllerEndereco@destroy');
});

Route::group(['prefix' => 'motorista'], function () {
    Route::get('', 'App\Http\Controllers\ControllerMotorista@index');
    Route::get('/{id_motorista}', 'App\Http\Controllers\ControllerMotorista@show');
    Route::post('', 'App\Http\Controllers\ControllerMotorista@store');
    Route::put('/{id_motorista}', 'App\Http\Controllers\ControllerMotorista@update');
    Route::delete('/{id_motorista}', 'App\Http\Controllers\ControllerMotorista@destroy');
});
