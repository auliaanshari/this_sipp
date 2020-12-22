<?php

namespace App\Http\Controllers;

use App\Models\LevelPendidikan;
use Illuminate\Http\Request;
use DataTables;

class LevelPendidikanController extends Controller
{
    public function data()
    {
        $level_pendidikan = LevelPendidikan::all();
        return DataTables::of($level_pendidikan)->toJson();
    }
}
