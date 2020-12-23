<?php

use App\Http\Controllers\NagariController;
use App\Http\Controllers\JorongController;
use App\Http\Controllers\KartuKeluargaController;
use App\Http\Controllers\DetailKeluargaController;
use App\Http\Controllers\LevelPendidikanController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\KewarganegaraanController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\LaporanController;
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
    return view('about');
});

Route::group(['prefix' => 'nagari'], function () {
    Route::get('/', function() { return view('datamaster.nagari'); });
    Route::post('/create', [NagariController::class, 'create']);
    Route::post('/update/{id}', [NagariController::class, 'update']);
    Route::get('/delete/{id}', [NagariController::class, 'delete']);
    Route::get('data', [NagariController::class, 'data']);
});

Route::group(['prefix' => 'jorong'], function () {
    Route::get('/', function() { return view('datamaster.jorong'); });
    Route::post('/create', [JorongController::class, 'create']);
    Route::post('/update/{id}', [JorongController::class, 'update']);
    Route::get('/delete/{id}', [JorongController::class, 'delete']);
    Route::get('data', [JorongController::class, 'data']);
    Route::get('combo', [JorongController::class, 'combo']);
});

Route::group(['prefix' => 'level_pendidikan'], function () {
    Route::get('/', function() { return view('datamaster.level_pendidikan'); });
    Route::post('/create', [LevelPendidikanController::class, 'create']);
    Route::post('/update/{id}', [LevelPendidikanController::class, 'update']);
    Route::get('/delete/{id}', [LevelPendidikanController::class, 'delete']);
    Route::get('data', [LevelPendidikanController::class, 'data']);
});

Route::group(['prefix' => 'pekerjaan'], function () {
    Route::get('/', function() { return view('datamaster.pekerjaan'); });
    Route::post('/create', [PekerjaanController::class, 'create']);
    Route::post('/update/{id}', [PekerjaanController::class, 'update']);
    Route::get('/delete/{id}', [PekerjaanController::class, 'delete']);
    Route::get('data', [PekerjaanController::class, 'data']);
});

Route::group(['prefix' => 'kewarganegaraan'], function () {
    Route::get('/', function() { return view('datamaster.kewarganegaraan'); });
    Route::post('/create', [KewarganegaraanController::class, 'create']);
    Route::post('/update/{id}', [KewarganegaraanController::class, 'update']);
    Route::get('/delete/{id}', [KewarganegaraanController::class, 'delete']);
    Route::get('data', [KewarganegaraanController::class, 'data']);
});

Route::group(['prefix' => 'kartu_keluarga'], function () {
    Route::get('/', function() { return view('sipp.kartu_keluarga'); });
    Route::post('/create', [KartuKeluargaController::class, 'create']);
    Route::post('/update/{id}', [KartuKeluargaController::class, 'update']);
    Route::get('/delete/{id}', [KartuKeluargaController::class, 'delete']);
    Route::get('data', [KartuKeluargaController::class, 'data']);
    Route::get('combo', [KartuKeluargaController::class, 'combo']);
});

Route::group(['prefix' => 'detail_keluarga'], function () {
    Route::get('/', function() { return view('sipp.detail_keluarga'); });
    Route::post('/create', [DetailKeluargaController::class, 'create']);
    Route::post('/update/{id}', [DetailKeluargaController::class, 'update']);
    Route::get('/delete/{id}', [DetailKeluargaController::class, 'delete']);
    Route::get('data2', [DetailKeluargaController::class, 'data2']);
    Route::get('combo_kk', [DetailKeluargaController::class, 'combo_kk']);
});

Route::group(['prefix' => 'penduduk'], function () {
    Route::get('/', function() { return view('sipp.penduduk'); });
    Route::post('/create', [PendudukController::class, 'create']);
    Route::post('/update/{id}', [PendudukController::class, 'update']);
    Route::get('/delete/{id}', [PendudukController::class, 'delete']);
    Route::get('data', [PendudukController::class, 'data']);
    Route::get('combo_kk', [PendudukController::class, 'combo_kk']);
    Route::get('combo_level', [PendudukController::class, 'combo_level']);
    Route::get('combo_kerja', [PendudukController::class, 'combo_kerja']);
    Route::get('combo_warga', [PendudukController::class, 'combo_warga']);
});

Route::group(['prefix' => 'laporan1'], function () {
    Route::get('/', function() { return view('laporan.laporan1'); });
    Route::get('data', [LaporanController::class, 'data']);
    Route::get('combo_kk', [LaporanController::class, 'combo_kk']);
    Route::get('combo_level', [LaporanController::class, 'combo_level']);
    Route::get('combo_kerja', [LaporanController::class, 'combo_kerja']);
    Route::get('combo_warga', [LaporanController::class, 'combo_warga']);
});

Route::group(['prefix' => 'laporan2'], function () {
    Route::get('/', function() { return view('laporan.laporan2'); });
    Route::get('data', [LaporanController::class, 'data2']);
    Route::get('combo_kk', [LaporanController::class, 'combo_kk']);
    Route::get('combo_level', [LaporanController::class, 'combo_level']);
    Route::get('combo_kerja', [LaporanController::class, 'combo_kerja']);
    Route::get('combo_warga', [LaporanController::class, 'combo_warga']);
});

Route::group(['prefix' => 'laporan3'], function () {
    Route::get('/', function() { return view('laporan.laporan3'); });
    Route::get('data', [LaporanController::class, 'data3']);
    Route::get('combo_kk', [LaporanController::class, 'combo_kk']);
    Route::get('combo_level', [LaporanController::class, 'combo_level']);
    Route::get('combo_kerja', [LaporanController::class, 'combo_kerja']);
    Route::get('combo_warga', [LaporanController::class, 'combo_warga']);
});


    