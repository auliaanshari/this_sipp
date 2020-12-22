<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevelPendidikansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level_pendidikan', function (Blueprint $table) {
            $table->id();
            $table->enum('nama', ['Tidak Sekolah', 'SD', 'SMP', 'SMA', 'S1', 'S2', 'S3']);

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
        Schema::dropIfExists('level_pendidikan');
    }
}
