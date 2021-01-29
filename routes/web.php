<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/endereco', 'App\Http\Controllers\ControllerEndereco@getEndereco');

Route::group(['prefix' => 'caroneiro'], function () {
    Route::get('', 'App\Http\Controllers\ControllerCaroneiro@index');
    Route::get('/{id_caroneiro}', 'App\Http\Controllers\ControllerCaroneiro@show');
    Route::post('', 'App\Http\Controllers\ControllerCaroneiro@store');
    Route::put('', 'App\Http\Controllers\ControllerCaroneiro@update');
    Route::delete('/{id_caroneiro}', 'App\Http\Controllers\ControllerCaroneiro@update');
});
