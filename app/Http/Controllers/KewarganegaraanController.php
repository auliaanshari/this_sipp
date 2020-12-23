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

    public function create(Request $request){
        $create = new Kewarganegaraan();
        $create->nama = $request->kewarganegaraan_input;
        $create->save();
    }

    public function update(Request $request, $id){
        $update = Kewarganegaraan::find($id);
        $update->nama = $request->kewarganegaraan_input;
        $update->save();
    }

    public function delete($id){
        Kewarganegaraan::where('id', $id)->delete();
    }
}
