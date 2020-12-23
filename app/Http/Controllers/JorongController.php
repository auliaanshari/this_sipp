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

    public function combo()
    {
        $nagari = Nagari::all();
        return $nagari->toJson();
    }

    public function create(Request $request){
        $create = new Jorong();
        $create->nama = $request->jorong_input;
        $create->nagari_id = $request->nagari_input;
        $create->save();
    }

    public function update(Request $request, $id){
        $update = Jorong::find($id);
        $update->nama = $request->jorong_input;
        $update->nagari_id = $request->nagari_input;
        $update->save();
    }

    public function delete($id){
        Jorong::where('id', $id)->delete();
    }
}
