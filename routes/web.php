<?php

use App\Http\Controllers\NagariController;
use App\Http\Controllers\JorongController;
use App\Http\Controllers\KartuKeluargaController;
use App\Http\Controllers\LevelPendidikanController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\KewarganegaraanController;
use App\Http\Controllers\PendudukController;
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
    return view('content');
});

Route::group(['prefix' => 'nagari'], function () {
    Route::get('/', function() { return view('nagari'); });
    Route::get('data', [NagariController::class, 'data']);
});

Route::group(['prefix' => 'jorong'], function () {
    Route::get('/', function() { return view('jorong'); });
    Route::get('data', [JorongController::class, 'data']);
});

Route::group(['prefix' => 'level_pendidikan'], function () {
    Route::get('/', function() { return view('level_pendidikan'); });
    Route::get('data', [LevelPendidikanController::class, 'data']);
});

Route::group(['prefix' => 'pekerjaan'], function () {
    Route::get('/', function() { return view('pekerjaan'); });
    Route::get('data', [PekerjaanController::class, 'data']);
});

Route::group(['prefix' => 'kewarganegaraan'], function () {
    Route::get('/', function() { return view('kewarganegaraan'); });
    Route::get('data', [KewarganegaraanController::class, 'data']);
});

Route::group(['prefix' => 'kartu_keluarga'], function () {
    Route::get('/', function() { return view('kartu_keluarga'); });
    Route::get('data', [KartuKeluargaController::class, 'data']);
});

Route::group(['prefix' => 'penduduk'], function () {
    Route::get('/', function() { return view('penduduk'); });
    Route::get('data', [PendudukController::class, 'data']);
});