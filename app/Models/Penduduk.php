<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "penduduk";

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
