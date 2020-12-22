<?php

namespace App\Http\Controllers;

use App\Models\Jorong;
use App\Models\Nagari;
use Illuminate\Http\Request;
use DataTables;

class JorongController extends Controller
{
    public function data()
    {
        $jorong = Jorong::with('nagari');
        return DataTables::of($jorong)->toJson();
    }
}
