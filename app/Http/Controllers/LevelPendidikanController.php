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

    public function create(Request $request){
        $create = new LevelPendidikan();
        $create->nama = $request->level_pendidikan_input;
        $create->save();
    }

    public function update(Request $request, $id){
        $update = LevelPendidikan::find($id);
        $update->nama = $request->level_pendidikan_input;
        $update->save();
    }

    public function delete($id){
        LevelPendidikan::where('id', $id)->delete();
    }
}
