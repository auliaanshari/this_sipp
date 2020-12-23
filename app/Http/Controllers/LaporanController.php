<?php

namespace App\Http\Controllers;

use App\Models\Nagari;
use App\Models\Jorong;
use App\Models\LevelPendidikan;
use App\Models\Pekerjaan;
use App\Models\Kewarganegaraan;
use App\Models\KartuKeluarga;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use DataTables;

class LaporanController extends Controller
{
    public function data()
    {
        $penduduk = Penduduk::with('kartu_keluarga', 'kewarganegaraan', 'level_pendidikan', 'pekerjaan')
                    ->whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 15 AND 64');
        return DataTables::of($penduduk)->toJson();
    }

    public function data2()
    {
        $nagari = Nagari::all();
        $penduduk = Penduduk::with('kartu_keluarga', 'kewarganegaraan', 'level_pendidikan', 'pekerjaan');
        return DataTables::of($penduduk)->toJson();
    }

    public function data3()
    {
        $level_pendidikan = LevelPendidikan::all();
        $penduduk = Penduduk::with('kartu_keluarga', 'kewarganegaraan', 'level_pendidikan', 'pekerjaan');
        return DataTables::of($penduduk)->toJson();
    }

    public function print(){
        
    }

    public function combo_kk()
    {
        $kk = KartuKeluarga::all();
        return $kk->toJson();
    }

    public function combo_level()
    {
        $level = LevelPendidikan::all();
        return $level->toJson();
    }

    public function combo_kerja()
    {
        $kerja = Pekerjaan::all();
        return $kerja->toJson();
    }

    public function combo_warga()
    {
        $warga = Kewarganegaraan::all();
        return $warga->toJson();
    }
}
