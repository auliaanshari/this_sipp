<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\KartuKeluarga;
use App\Models\LevelPendidikan;
use App\Models\Pekerjaan;
use App\Models\Kewarganegaraan;
use Illuminate\Http\Request;
use DataTables;

class PendudukController extends Controller
{
    public function data()
    {
        $penduduk = Penduduk::with('kartu_keluarga', 'level_pendidikan', 'pekerjaan', 'kewarganegaraan');
        return DataTables::of($penduduk)->toJson();
    }

    public function create(Request $request){
        $create = new Penduduk();
        $create->keluarga_id = $request->kk_input;
        $create->nama = $request->nama_input;
        $create->nik = $request->nik_input;
        $create->tempat_lahir = $request->tl_input;
        $create->tanggal_lahir = $request->tgl_input;
        $create->agama = $request->agama_input;
        $create->jenis_kelamin = $request->jeniskel_input;
        $create->level_pendidikan_id = $request->level_input;
        $create->pekerjaan_id = $request->kerja_input;
        $create->status_pernikahan = $request->nikah_input;
        $create->status_keluarga = $request->keluarga_input;
        $create->kewarganegaraan_id = $request->warga_input;
        $create->ayah = $request->ayah_input;
        $create->ibu = $request->ibu_input;
        $create->save();
    }

    public function update(Request $request, $id){
        $update = Penduduk::find($id);
        $update->keluarga_id = $request->kk_input;
        $update->nama = $request->nama_input;
        $update->nik = $request->nik_input;
        $update->tempat_lahir = $request->tl_input;
        $update->tanggal_lahir = $request->tgl_input;
        $update->agama = $request->agama_input;
        $update->jenis_kelamin = $request->jeniskel_input;
        $update->level_pendidikan_id = $request->level_input;
        $update->pekerjaan_id = $request->kerja_input;
        $update->status_pernikahan = $request->nikah_input;
        $update->status_keluarga = $request->keluarga_input;
        $update->kewarganegaraan_id = $request->warga_input;
        $update->ayah = $request->ayah_input;
        $update->ibu = $request->ibu_input;
        $update->save();
    }

    public function delete($id){
        Penduduk::where('id', $id)->delete();
    }

    public function combo_kk()
    {
        $kk = KartuKeluarga::all();
        return $kk->toJson();
    }

    public function combo_level()
    {
        $level = LevelPendidikan::all();
        return $level->toJson();
    }

    public function combo_kerja()
    {
        $kerja = Pekerjaan::all();
        return $kerja->toJson();
    }

    public function combo_warga()
    {
        $warga = Kewarganegaraan::all();
        return $warga->toJson();
    }
}
