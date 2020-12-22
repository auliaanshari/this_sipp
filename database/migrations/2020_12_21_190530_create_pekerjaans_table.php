<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePekerjaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pekerjaan', function (Blueprint $table) {
            $job = array("Belum/ Tidak Bekerja", "Mengurus Rumah Tangga", "Pelajar/ Mahasiswa", "Pensiunan",
            "Pewagai Negeri Sipil", "Petani/ Pekebun", "Peternak", "Nelayan/ Perikanan", "Karyawan Swasta",
            "Karyawan Honorer", "Buruh Harian Lepas", "Pembantu Rumah Tangga", "Seniman", "Wartawan", 
            "Juru Masak", "Duta Besar", "Dosen", "Guru", "Pilot", "Pengacara", "Arsitek", "Dokter", "Bidan", 
            "Perawat", "Psikiater/ Psikolog", "Penyiar Televisi", "Pelaut", "Sopir", "Paranormal", "Pedagang", "Wiraswasta");
            $table->id();
            $table->enum('nama', $job);

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
        Schema::dropIfExists('pekerjaan');
    }
}
