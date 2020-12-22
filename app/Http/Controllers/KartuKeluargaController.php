<?php

namespace App\Http\Controllers;

use App\Models\KartuKeluarga;
use App\Models\Jorong;
use Illuminate\Http\Request;
use DataTables;

class KartuKeluargaController extends Controller
{
    public function data()
    {
        $kartu_keluarga = KartuKeluarga::with('jorong');
        return DataTables::of($kartu_keluarga)->toJson();
    }
}
