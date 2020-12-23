<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jorong extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "jorong";

    protected $fillable = [
        'nama'
    ];

    public function nagari(){
        return $this->belongsTo(Nagari::class);
    }

    public function kartu_keluarga(){
        return $this->hasMany(KartuKeluarga::class);
    }
}
