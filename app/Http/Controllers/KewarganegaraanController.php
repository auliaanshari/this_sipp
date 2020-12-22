<?php

namespace App\Http\Controllers;

use App\Models\Kewarganegaraan;
use Illuminate\Http\Request;
use DataTables;

class KewarganegaraanController extends Controller
{
    public function data()
    {
        $kewarganegaraan = Kewarganegaraan::all();
        return DataTables::of($kewarganegaraan)->toJson();
    }
}
