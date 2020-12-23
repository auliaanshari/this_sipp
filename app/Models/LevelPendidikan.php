<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelPendidikan extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "level_pendidikan";

    protected $fillable = [
        'nama'
    ];

    public function penduduk(){
        return $this->hasMany(Penduduk::class);
    }
}
