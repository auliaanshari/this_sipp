<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\KartuKeluarga;
use App\Models\Jorong;
use Illuminate\Http\Request;
use DataTables;

class DetailKeluargaController extends Controller
{
    public function data()
    {
        $kartu_keluarga = KartuKeluarga::with('jorong');
        return DataTables::of($kartu_keluarga)->toJson();
    }

    public function combo()
    {
        $jorong = Jorong::all();
        return $jorong->toJson();
    }

    public function create(Request $request){
        $create = new KartuKeluarga();
        $create->no = $request->kk_input;
        $create->jorong_id = $request->jorong_input;
        $create->tanggal_pencatatan = $request->tgl_input;
        $create->save();
    }

    public function update(Request $request, $id){
        $update = KartuKeluarga::find($id);
        $update->no = $request->kk_input;
        $update->jorong_id = $request->jorong_input;
        $update->tanggal_pencatatan = $request->tgl_input;
        $update->save();
    }

    public function delete($id){
        KartuKeluarga::where('id', $id)->delete();
    }

    public function data2()
    {   
        $keluarga = Penduduk::with('kartu_keluarga');
        return DataTables::of($keluarga)->toJson();
    }

    public function combo_kk()
    {
        $kk = KartuKeluarga::all();
        return $kk->toJson();
    }
}
