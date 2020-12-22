<?php

namespace Database\Seeders;

use App\Models\LevelPendidikan;
use Illuminate\Database\Seeder;

class LevelPendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $level_pendidikan = array('Tidak Sekolah', 'SD', 'SMP', 'SMA', 'S1', 'S2', 'S3');
        foreach($level_pendidikan as $level):
        LevelPendidikan::create([
            'nama' => $level
        ]);
        endforeach;
    }
}
