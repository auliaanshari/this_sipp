<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "kartu_keluarga";

    protected $fillable = [
        'nama'
    ];

    public function jorong(){
        return $this->belongsTo(Jorong::class);
    }

    public function penduduk(){
        return $this->hasMany(Penduduk::class);
    }
}
