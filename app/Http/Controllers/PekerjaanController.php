<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use DataTables;

class PekerjaanController extends Controller
{
    public function data()
    {
        $pekerjaan = Pekerjaan::all();
        return DataTables::of($pekerjaan)->toJson();
    }
}
