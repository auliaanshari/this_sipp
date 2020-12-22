<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\KartuKeluarga;
use App\Models\LevelPendidikan;
use App\Models\Pekerjaan;
use App\Models\Kewarganegaraan;
use Illuminate\Http\Request;
use DataTables;

class PendudukController extends Controller
{
    public function data()
    {
        $penduduk = Penduduk::with('kartu_keluarga', 'level_pendidikan', 'pekerjaan', 'kewarganegaraan');
        return DataTables::of($penduduk)->toJson();
    }
}
