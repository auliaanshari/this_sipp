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

    public function create(Request $request){
        $create = new Nagari();
        $create->nama = $request->nagari_input;
        $create->save();
    }

    public function update(Request $request, $id){
        $update = Nagari::find($id);
        $update->nama = $request->nagari_input;
        $update->save();
    }

    public function delete($id){
        Nagari::where('id', $id)->delete();
    }
}
