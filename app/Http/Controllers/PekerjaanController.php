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

    public function create(Request $request){
        $create = new Pekerjaan();
        $create->nama = $request->pekerjaan_input;
        $create->save();
    }

    public function update(Request $request, $id){
        $update = Pekerjaan::find($id);
        $update->nama = $request->pekerjaan_input;
        $update->save();
    }

    public function delete($id){
        Pekerjaan::where('id', $id)->delete();
    }
}
