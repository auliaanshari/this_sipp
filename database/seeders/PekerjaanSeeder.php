<?php

namespace Database\Seeders;

use App\Models\Pekerjaan;
use Illuminate\Database\Seeder;

class PekerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobs = array("Belum/ Tidak Bekerja", "Mengurus Rumah Tangga", "Pelajar/ Mahasiswa", "Pensiunan",
            "Pewagai Negeri Sipil", "Petani/ Pekebun", "Peternak", "Nelayan/ Perikanan", "Karyawan Swasta",
            "Karyawan Honorer", "Buruh Harian Lepas", "Pembantu Rumah Tangga", "Seniman", "Wartawan", 
            "Juru Masak", "Duta Besar", "Dosen", "Guru", "Pilot", "Pengacara", "Arsitek", "Dokter", "Bidan", 
            "Perawat", "Psikiater/ Psikolog", "Penyiar Televisi", "Pelaut", "Sopir", "Paranormal", "Pedagang", "Wiraswasta");
        foreach($jobs as $job):
            Pekerjaan::create([
            'nama' => $job
        ]);
        endforeach;
    }
}
