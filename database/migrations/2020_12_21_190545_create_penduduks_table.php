<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenduduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penduduk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('keluarga_id')->constrained('kartu_keluarga')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama');
            $table->string('nik');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('agama', ['Islam', 'Katolik', 'Protestan', 'Hindu', 'Buddha', 'Konghucu']);
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->foreignId('level_pendidikan_id')->constrained('level_pendidikan')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('pekerjaan_id')->constrained('pekerjaan')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('status_pernikahan', ['Belum Menikah', 'Menikah', 'Janda/Duda']);
            $table->enum('status_keluarga', ['Ayah', 'Ibu', 'Anak', 'Orang Tua']);
            $table->foreignId('kewarganegaraan_id')->constrained('kewarganegaraan')->onUpdate('cascade')->onDelete('cascade');
            $table->string('ayah');
            $table->string('ibu');
            
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penduduk');
    }
}

