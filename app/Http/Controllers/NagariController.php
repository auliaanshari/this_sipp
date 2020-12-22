<?php

namespace App\Http\Controllers;

use App\Models\Nagari;
use Illuminate\Http\Request;
use DataTables;

class NagariController extends Controller
{
    public function data()
    {
        $nagari = Nagari::all();
        return DataTables::of($nagari)->toJson();
    }
}
