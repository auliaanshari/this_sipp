<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "penduduk";

    protected $fillable = [
        'nama', 'nik', 'tempat_lahir', 'tanggal_lahir', 'agama', 'jenis_kelamin', 
        'status_pernikahan', 'status_keluarga', 'ayah', 'ibu'
    ];

    public function kartu_keluarga(){
        return $this->belongsTo(KartuKeluarga::class,'keluarga_id');
    }

    public function level_pendidikan(){
        return $this->belongsTo(LevelPendidikan::class);
    }

    public function pekerjaan(){
        return $this->belongsTo(Pekerjaan::class);
    }

    public function kewarganegaraan(){
        return $this->belongsTo(Kewarganegaraan::class);
    }
}
