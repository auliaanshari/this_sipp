<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewarganegaraan extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "kewarganegaraan";

    public function penduduk(){
        return $this->hasMany(Penduduk::class);
    }
}
